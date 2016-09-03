<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_menu.php
* Brief:       
*      Part of theme control panel.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/

/*********************************************************** 
* Definitions
************************************************************/

/*********************************************************** 
* Class name:
*    CPMenuItem
* Descripton:
*    Implementation of CPMenuItem 
***********************************************************/
class CPMenuItem
{
    const ITEM_USE_PAGE = 1;
    const ITEM_USE_LINK = 2;
    
    /*********************************************************** 
    * Constructor
    ************************************************************/    
    public function __construct() 
    {   
        $this->_hide = false;
        $this->_link = '';
        $this->_name = '';
        $this->_page = CMS_NOT_SELECTED;
        $this->_submenu = CMS_NOT_SELECTED;
        $this->_type = CPMenuItem::ITEM_USE_LINK;
    } 
    
    /*********************************************************** 
    * Public members  
    ************************************************************/
    
    public $_name;
    public $_link;
    public $_page;
    public $_type;
    public $_submenu;
    public $_hide;
       
} // CPMenuItem

/*********************************************************** 
* Class name:
*    CPSubMenu
* Descripton:
*    Implementation of CPSubMenu 
***********************************************************/
class CPSubMenu
{
    /*********************************************************** 
    * Constructor
    ************************************************************/    
    public function __construct() 
    {   
        $this->_name = '';
        $this->_items = Array();
    } 
    
    /*********************************************************** 
    * Public members  
    ************************************************************/
    
    public $_name;
    public $_items;    
} // CPSubMenu


/*********************************************************** 
* Class name:
*    CPMenu
* Descripton:
*    Implementation of CPGeneral 
***********************************************************/
class CPMenu 
{
    const DBIDOPT_TOP_ITEMS = 'PRESTIGE_MENU_TOP_ITEMS_OPT';
    const DBIDOPT_SUBMENUS = 'PRESTIGE_SUBMENUS_OPT';
    const DBIDOPT_SETTINGS = 'PRESTIGE_MENU_SETTINGS_OPT';
    const MAX_SUBMENU_LEVEL = 3;
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // menu settings
        $this->_set = get_option(CPMenu::DBIDOPT_SETTINGS);
        if (!is_array($this->_set))
        {
            add_option(CPMenu::DBIDOPT_SETTINGS, $this->_setDef);
            $this->_set = get_option(CPMenu::DBIDOPT_SETTINGS);
        } 

        // menu top level elements
        $this->_top = get_option(CPMenu::DBIDOPT_TOP_ITEMS);
        if (!is_array($this->_top))
        {
            add_option(CPMenu::DBIDOPT_TOP_ITEMS, Array());
            $this->_top = get_option(CPMenu::DBIDOPT_TOP_ITEMS);
        }  
        
        // submenus
        $this->_sub = get_option(CPMenu::DBIDOPT_SUBMENUS);
        if (!is_array($this->_sub))
        {
            add_option(CPMenu::DBIDOPT_SUBMENUS, Array());
            $this->_sub = get_option(CPMenu::DBIDOPT_SUBMENUS);
        }
                                     
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
    private $_set = Array(); // menu settings
    private $_setDef = Array( // default menu settings   
        'menu_use_wp_custom_menu' => false,
        'menu_top_item_color' => '888888',
        'menu_top_item_hover_color' => 'FFFFFF'
        );  
    
    private $_top = Array(); // menu top items list
    private $_sub = Array(); // sumenus list 
    private $_saved = false; // have true if some settings was processed and saved
   
    /*********************************************************** 
    * Public functions
    ************************************************************/               

    public function renderTab()
    {
        $this->process();
       
        echo '<div class="cms-content-wrapper">';
        $this->renderMenuSettingsCMS();
        $this->renderTopMenuCMS();
        $this->renderSubmenuCMS();      
        echo '</div>';
    }    
  
    public function renderMenu()
    {
        if($this->_set['menu_use_wp_custom_menu'])
        {
            wp_nav_menu(array('menu_id' => 'custom-menu-navigation', 'walker' => new DCC_WPMenuCustomWalker(), 'theme_location' => 'dcm_primary' ));
            return;
        }
        
        global $post;               
        
        echo '<ul id="navigation">';        
        
        foreach($this->_top as $item)
        {
            if($item->_hide) { continue; }
            
            $out = '<li';
            if($item->_submenu != CMS_NOT_SELECTED) 
            {
                $out .= ' class="arrow-down" ';
            }
            
            $parent = false;
            if($item->_type == CPMenuItem::ITEM_USE_PAGE)
            {
                // $childs = get_pages('child_of='.$item->_page);
                global $wpdb;
                $childs = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page' AND post_parent = $item->_page");
                
                $count = count($childs);  
                
                for($i = 0; $i < $count; $i++)
                {
                    if($post->ID == $childs[$i]->ID)
                    {
                        $parent = true;
                        break;    
                    }
                }       
            }
            
            if($post->ID == $item->_page or $parent)
            {
                $out .= '><a class="top-selected"';
            } else
            {
                $out .= '><a class="top"';
            }
            
            
            if($item->_type != CMS_NOT_SELECTED)
            {
                
                if($item->_type == CPMenuItem::ITEM_USE_LINK)
                {
                    $out .= 'href="'.$item->_link.'"';
                } else
                {
                    $out .= 'href="'.get_permalink($item->_page).'"';
                }
            }
            
            $out .= '>';
            $out .= $item->_name;
            $out .= '</a>';
            echo $out;

            // if have submenu we must render it
            if($item->_submenu != CMS_NOT_SELECTED)
            {
                 $this->renderSubmenu($item->_submenu, 1);
            } 
            
            echo '</li>';

        } // for
        echo '</ul>';                                                                  
    }       
 
    public function customCSS()
    {
        $out = '';
        $out .= '<style type="text/css">';        
        
            // menu top items hover color
            
            $out .= '#navigation a.top, #custom-menu-navigation a.top {';
            $out .= 'color:#'.$this->_set['menu_top_item_color'].';';
            $out .= '} ';                        
        
            $out .= '#navigation a.top:hover, #custom-menu-navigation a.top:hover, #navigation a.top-selected, #navigation a.top-selected:hover {';
            $out .= 'color:#'.$this->_set['menu_top_item_hover_color'].';';
            $out .= '} ';         
        
        $out .= '</style>';
        echo $out;        
    }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/
    
    private function renderSubmenu($index, $level)
    {
        // check submenu level
        if($level > CPMenu::MAX_SUBMENU_LEVEL)
        {
            return;
        }
        
        $subcount = count($this->_sub);
        if($index < $subcount)
        {
        
            echo '<ul>';
            
            foreach($this->_sub[$index]->_items as $item)
            {
                if($item->_hide) { continue; }
                
                $out = '<li><a ';
                if($item->_submenu != CMS_NOT_SELECTED) 
                {
                    $out .= ' class="arrow-right" ';
                }
                
                if($item->_type == CPMenuItem::ITEM_USE_LINK)
                {
                    $out .= 'href="'.$item->_link.'"';
                } else
                {
                    $out .= 'href="'.get_permalink($item->_page).'"';
                }
                
                $out .= '>';
                $out .= $item->_name;
                $out .= '</a>';
                echo $out;

                // if have submenu we must render it
                if($item->_submenu != CMS_NOT_SELECTED)
                {
                     $this->renderSubmenu($item->_submenu, $level + 1);
                } 
                
                echo '</li>';

            } // for
            
            
            echo '</ul>';
        }    
    }
            
    private function process()
    {        
        $this->processMenuSettings(); 
        $this->processMenuTopItems();
        $this->processSubmenus();        
    }    
   
    private function processMenuSettings()
    {
        if(isset($_POST['menu_save_settings']))
        {
            $this->_set['menu_use_wp_custom_menu'] = isset($_POST['menu_use_wp_custom_menu']) ? true : false; 
            $this->_set['menu_top_item_color'] = $_POST['menu_top_item_color'];
            $this->_set['menu_top_item_hover_color'] = $_POST['menu_top_item_hover_color']; 
            
            update_option(CPMenu::DBIDOPT_SETTINGS, $this->_set);
            $this->_saved = true;                                
        }         
    }
   
    private function processMenuTopItems()
    {        
        if(isset($_POST['tmi_delete']))
        {
            $index = $_POST['index'];
            unset($this->_top[$index]);
            $this->_top = array_values($this->_top);
            update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
            $this->_saved = true;                      
        }
        
        if(isset($_POST['tmi_save']))
        {
            
            $index = $_POST['index'];
    
            $this->_top[$index]->_hide = isset($_POST['hide']) ? true : false;
            $this->_top[$index]->_name = $_POST['name'];
            $this->_top[$index]->_page = $_POST['page'];
            $this->_top[$index]->_type = $_POST['type'];
            $this->_top[$index]->_link = $_POST['link'];
            $this->_top[$index]->_submenu = $_POST['submenu'];
            $this->_top[$index]->_page = $_POST['page'];
            
            update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
            $this->_saved = true;                   
        }        
        
        if(isset($_POST['tmi_add']))
        {
            $item = new CPMenuItem();
            $item->_name = $_POST['name'];            
            array_push($this->_top, $item);
            update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
            $this->_saved = true;                      
        } 
        
        if(isset($_POST['tmi_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_top[$index - 1];
                $this->_top[$index - 1] = $this->_top[$index];
                $this->_top[$index] = $temp;
                
                update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
                $this->_saved = true;
            }                      
        } 
        
        if(isset($_POST['tmi_movedown']))
        {
            $index = $_POST['index'];
            $count = count($this->_top); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_top[$index + 1];
                $this->_top[$index + 1] = $this->_top[$index];
                $this->_top[$index] = $temp;
                
                update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
                $this->_saved = true;
            }                      
        }                       
 
        if(isset($_POST['tmi_addbelow']))
        {
            $index = $_POST['index'];
            $count = count($this->_top);
            $item = new CPMenuItem();                              
            
            if($count == 0 or $index == $count-1)
            {
                array_push($this->_top, $item); 
            } else
            {
                // get the start of the array  
                $start = array_slice($this->_top, 0, $index+1); 
                // get the end of the array
                $end = array_slice($this->_top, $index+1);
                // add the new element to the array
                $start[] = $item;
                // glue them back together and return
                $this->_top = array_merge($start, $end);   
            } 
            update_option(CPMenu::DBIDOPT_TOP_ITEMS, $this->_top);
            $this->_saved = true;                      
        }  
        
    }
    
    private function processSubmenus()
    {
        if(isset($_POST['sub_add']))
        {
            $sub = new CPSubMenu();
            $sub->_name = $_POST['name'];            
            array_push($this->_sub, $sub);
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }  
       
        if(isset($_POST['sub_delete']))
        {
            $index = $_POST['subindex'];
            unset($this->_sub[$index]);
            $this->_sub = array_values($this->_sub);
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }
    
        if(isset($_POST['sub_save']))
        {
            $index = $_POST['subindex'];
            $this->_sub[$index]->_name = $_POST['name'];
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }    
        
        if(isset($_POST['subi_add']))
        {
            $item = new CPMenuItem();
            $item->_name = $_POST['name']; 
            
            $index = $_POST['subindex'];
                       
            array_push($this->_sub[$index]->_items, $item);
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }         
      
        if(isset($_POST['subi_delete']))
        {
            $index = $_POST['index'];
            $subindex = $_POST['subindex']; 
            unset($this->_sub[$subindex]->_items[$index]);
            $this->_sub[$subindex]->_items = array_values($this->_sub[$subindex]->_items);
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }
    
        if(isset($_POST['subi_addbelow']))
        {
            $index = $_POST['index'];
            $subindex = $_POST['subindex'];
            $count = count($this->_sub[$subindex]->_items);
            $item = new CPMenuItem();                              
            
            if($count == 0 or $index == $count-1)
            {
                array_push($this->_sub[$subindex]->_items, $item); 
            } else
            {
                // get the start of the array  
                $start = array_slice($this->_sub[$subindex]->_items, 0, $index+1); 
                // get the end of the array
                $end = array_slice($this->_sub[$subindex]->_items, $index+1);
                // add the new element to the array
                $start[] = $item;
                // glue them back together and return
                $this->_sub[$subindex]->_items = array_merge($start, $end);   
            } 
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                      
        }                
        
        if(isset($_POST['subi_moveup']))
        {
            $index = $_POST['index'];
            $subindex = $_POST['subindex'];
            if($index > 0)
            {         
                $temp = $this->_sub[$subindex]->_items[$index - 1];
                $this->_sub[$subindex]->_items[$index - 1] = $this->_sub[$subindex]->_items[$index];
                $this->_sub[$subindex]->_items[$index] = $temp;
                
                update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
                $this->_saved = true;
            }                      
        } 
        
        if(isset($_POST['subi_movedown']))
        {
            $index = $_POST['index'];
            $subindex = $_POST['subindex'];
            $count = count($this->_sub[$subindex]->_items); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_sub[$subindex]->_items[$index + 1];
                $this->_sub[$subindex]->_items[$index + 1] = $this->_sub[$subindex]->_items[$index];
                $this->_sub[$subindex]->_items[$index] = $temp;
                
                update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
                $this->_saved = true;
            }                      
        }          
       
        if(isset($_POST['subi_save']))
        {          
            $index = $_POST['index'];
            $subindex = $_POST['subindex'];
    
            $this->_sub[$subindex]->_items[$index]->_hide = isset($_POST['hide']) ? true : false;
            $this->_sub[$subindex]->_items[$index]->_name = $_POST['name'];
            $this->_sub[$subindex]->_items[$index]->_page = $_POST['page'];
            $this->_sub[$subindex]->_items[$index]->_type = $_POST['type'];
            $this->_sub[$subindex]->_items[$index]->_link = $_POST['link'];
            $this->_sub[$subindex]->_items[$index]->_submenu = $_POST['submenu'];
            $this->_sub[$subindex]->_items[$index]->_page = $_POST['page'];
            
            update_option(CPMenu::DBIDOPT_SUBMENUS, $this->_sub);
            $this->_saved = true;                     
        }             
                       
    }

    private function renderMenuSettingsCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        }   
        
         // menu core settings
         $out = '';
         $out .= '<a name="menu-set"></a>';
         $out .= '<div style="margin-top:0px;">';         
         $out .= '<h6 class="cms-h6">Menu settings</h6><hr class="cms-hr"/>';
         $out .= '<form action="#menu-set" method="post" >';                                                                                                                                        
         $out .= '<input type="checkbox" name="menu_use_wp_custom_menu" '.($this->_set['menu_use_wp_custom_menu'] ? ' checked="checked" ' : '').' /> Use WordPress custom menu<br /><br />';
         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_set['menu_top_item_color'].'" name="menu_top_item_color" /> Menu top item color <br />'; 
         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_set['menu_top_item_hover_color'].'" name="menu_top_item_hover_color" /> Menu top item hover color <br />'; 
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="menu_save_settings" /><br />';         
         $out .= '</div>';                           
         $out .= '</form></div>';
         echo $out;                
    }
    
    private function renderTopMenuCMS()
    {
      
        
        $num = count($this->_top);         
        if($num > 0)
        {
            // menu top elements list
            echo '<div style="height:50px;"></div>';  
            echo '<h6 class="cms-h6">Top level elements</h6><hr class="cms-hr"/>';

            echo '<div style="margin-bottom:30px;">';
            
            echo '<table>';        
            echo '<thead>
                    <tr>
                        <th style="padding:0px 3px 0px 3px;">Hide</th>
                        <th style="padding:0px 3px 0px 3px;">Name</th>
                        <th style="padding:0px 3px 0px 3px;">Page</th>
                        <th style="padding:0px 3px 0px 3px;">Use</th>
                        <th style="padding:0px 3px 0px 3px;">Link</th>
                        <th style="padding:0px 3px 0px 3px;">Use</th>
                        <th style="padding:0px 3px 0px 3px;">Submenu</th>
                        <th style="padding:0px 3px 0px 3px;">Save</th>
                        <th style="padding:0px 3px 0px 3px;">Delete</th>
                        <th style="padding:0px 3px 0px 3px;">Add</th>
                        <th style="padding:0px 3px 0px 3px;">Up</th>
                        <th style="padding:0px 3px 0px 3px;">Down</th>                        
                    </tr>
                  </thead>';
            $num = count($this->_top);
            for($i = 0; $i < $num; $i++)
            {            
                echo '<tr>';
                // hide menu item
                echo '              
                    <td style="text-align:center;"><form action="#" method="POST">
                    <input type="checkbox" '.($this->_top[$i]->_hide ? ' checked="checked" ' : '').' name="hide" title="Select to hide element" /></td>'; 
                // name     
                echo '<td><input type="hidden" name="index" value="'.$i.'" />
                    <input style="width:120px;" type="text" name="name" value="'.$this->_top[$i]->_name.'" title="Menu item name" /></td>';
                // page / use page                   
                $this->printPagesList($this->_top[$i]->_page, 'page', 120);
               
                echo '<td style="text-align:center;"><input type="radio" '.($this->_top[$i]->_type == CPMenuItem::ITEM_USE_PAGE ? ' checked="checked" ' : '').'  
                    value="'.CPMenuItem::ITEM_USE_PAGE.'" name="type" title="Select to use page address as link" /></td>';
                // link / use link   
                echo '<td><input style="width:120px;" type="text" name="link" value="'.$this->_top[$i]->_link.'" /></td>
                    <td style="text-align:center;"><input type="radio" name="type" '.($this->_top[$i]->_type == CPMenuItem::ITEM_USE_LINK ? ' checked="checked" ' : '').'
                    value="'.CPMenuItem::ITEM_USE_LINK.'" title="Select to use own address as link" /></td>';
                // submenu     
                $this->printSubmenuList(null, $this->_top[$i]->_submenu);
                
                // save / delete 
                echo '<td><input  class="cms-submit" type="submit" value="Save" name="tmi_save" /></td> 
                    <td><input  onclick="return confirm('."'Delete item?'".')" class="cms-submit-delete" type="submit" value="Delete" name="tmi_delete" /></td>
                <td><input  class="cms-submit" type="submit" value="Add" name="tmi_addbelow" /></td>
                <td><input  class="cms-submit" type="submit" value="Up" name="tmi_moveup" /></td>
                <td><input  class="cms-submit" type="submit" value="Down" name="tmi_movedown" /></form></td>';                                
                echo '</tr>';
            }    
            echo '</table>';     
            echo '</div>';        
        } // if
        
        // add new menu top item
        echo '<div style="margin-bottom:15px;margin-top:15px;">';
        echo '<form action="#" method="POST">';
        echo '
            <input style="width:140px;" type="text" name="name" value="Item name" />
            <input style="width:180px;" class="cms-submit" type="submit" value="Add new menu top item" name="tmi_add" />';
        echo '</form>';
        
        // add new submenu
        echo '<form action="#" method="POST">';
        echo '
            <input style="width:140px;" type="text" name="name" value="Name" />
            <input style="width:180px;" class="cms-submit" type="submit" value="Create new submenu" name="sub_add" />';
        echo '</form></div>';                     
    }
        
    private function renderSubmenuCMS()
    {     
        $subcount = count($this->_sub);
        
        for($i = 0; $i < $subcount; $i++)
        {   
            echo '<a name="submenu_'.$i.'"></a>';
            echo '<div style="margin-bottom:30px;margin-top:70px;">';
            echo '<h6 class="cms-h6">Submenu: '.$this->_sub[$i]->_name.'</h6><hr class="cms-hr"/>';
            // submenu settings
            echo '<form action="#submenu_'.$i.'" method="POST">';
            echo '
                <input style="width:120px;" type="text" name="name" value="'.$this->_sub[$i]->_name.'" />
                <input  class="cms-submit" type="hidden" value="'.$i.'" name="subindex" />
                <input  class="cms-submit" type="submit" value="Save" name="sub_save" />
                <input onclick="return confirm('."'Delete submenu?'".')" class="cms-submit-delete" type="submit" value="Delete" name="sub_delete" />';
            echo '</form></div>'; 
            
            $itemscount = count($this->_sub[$i]->_items);
            
            if($itemscount > 0)
            {            
          
                echo '<div style="margin-bottom:30px;"><table>';        
                echo '<thead>
                        <tr>
                            <th style="padding:0px 3px 0px 3px;">Hide</th>
                            <th style="padding:0px 3px 0px 3px;">Name</th>
                            <th style="padding:0px 3px 0px 3px;">Page</th>
                            <th style="padding:0px 3px 0px 3px;">Use</th>
                            <th style="padding:0px 3px 0px 3px;">Link</th>
                            <th style="padding:0px 3px 0px 3px;">Use</th>
                            <th style="padding:0px 3px 0px 3px;">Submenu</th>
                            <th style="padding:0px 3px 0px 3px;">Save</th>
                            <th style="padding:0px 3px 0px 3px;">Delete</th>
                            <th style="padding:0px 3px 0px 3px;">Add</th>
                            <th style="padding:0px 3px 0px 3px;">Up</th>
                            <th style="padding:0px 3px 0px 3px;">Down</th>
                        </tr>
                      </thead>';

                for($j = 0; $j < $itemscount; $j++)
                {            
                    echo '<tr>';
                    // hide menu item
                    echo '              
                        <td style="text-align:center;"><form action="#submenu_'.$i.'" method="POST">
                        <input type="checkbox" '.($this->_sub[$i]->_items[$j]->_hide ? ' checked="checked" ' : '').' name="hide" title="Select to hide element" /></td>'; 
                    // name     
                    echo '<td><input type="hidden" name="subindex" value="'.$i.'" /><input type="hidden" name="index" value="'.$j.'" />
                        <input style="width:120px;" type="text" name="name" value="'.$this->_sub[$i]->_items[$j]->_name.'" title="Menu item name" /></td>';
                    // page / use page                   
                    $this->printPagesList($this->_sub[$i]->_items[$j]->_page, 'page', 120); 
                    
                    echo '<td style="text-align:center;"><input type="radio" '.($this->_sub[$i]->_items[$j]->_type == CPMenuItem::ITEM_USE_PAGE ? ' checked="checked" ' : '').'  
                        value="'.CPMenuItem::ITEM_USE_PAGE.'" name="type" title="Select to use page address as link" /></td>';
                    // link / use link   
                    echo '<td><input style="width:120px;" type="text" name="link" value="'.$this->_sub[$i]->_items[$j]->_link.'" /></td>
                        <td style="text-align:center;"><input type="radio" name="type" '.($this->_sub[$i]->_items[$j]->_type == CPMenuItem::ITEM_USE_LINK ? ' checked="checked" ' : '').'
                        value="'.CPMenuItem::ITEM_USE_LINK.'" title="Select to use own address as link" /></td>';
                    // submenu     
                    $this->printSubmenuList($i, $this->_sub[$i]->_items[$j]->_submenu);
                    
                    // save / delete 
                    echo '<td><input  class="cms-submit" type="submit" value="Save" name="subi_save" /></td> 
                        <td><input  onclick="return confirm('."'Delete item?'".')" class="cms-submit-delete" type="submit" value="Delete" name="subi_delete" /></td>
                    <td><input  class="cms-submit" type="submit" value="Add" name="subi_addbelow" /></td>
                    <td><input  class="cms-submit" type="submit" value="Up" name="subi_moveup" /></td>
                    <td><input  class="cms-submit" type="submit" value="Down" name="subi_movedown" /></form></td>';                                
                    echo '</tr>';
                } // for $j   
                echo '</table></div>';          
            
            } // if                
            
            // add new menu top item
            echo '<div style="margin-bottom:20px;">';
            echo '<form action="#submenu_'.$i.'" method="POST">';
            echo '
                <input style="width:140px;" type="text" name="name" value="Item name" />
                <input type="hidden" name="subindex" value="'.$i.'" />
                <input class="cms-submit" type="submit" value="Add new submenu item" name="subi_add" />';
            echo '</form></div>';            
            
        } // for $i        
    }          
             
    private function printSubmenuList($subindex, $itemsub)
    {
        echo '<td><select style="width:120px;" name="submenu"><option value="'.CMS_NOT_SELECTED.'">Not selected</option>';
        
        $count = count($this->_sub);
        for($i = 0; $i < $count; $i++)
        {
            if($subindex !== null)
            {
                if($subindex == $i) continue;    
            }
            
            $out = '<option value="'.$i.'" ';
            
            if($itemsub !== null)
            {
                if($i == $itemsub) $out .= ' selected="selected" ';
            }
            
            $out .= '>';
            $out .= $this->_sub[$i]->_name;
            $out .= '</option>';
            
            echo $out;    
        } // for        
        echo '</select></td>';        
    }
    
    private function printPagesList($itempage, $name, $width)
    {
        echo '<td><select style="width:'.$width.'px;" name="'.$name.'"><option value="'.CMS_NOT_SELECTED.'">Not selected</option>';
        
        global $wpdb;
        $pages = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page' ORDER BY post_title ");        
        $count = count($pages);
        for($i = 0; $i < $count; $i++)
        {
   
            $out = '<option value="'.$pages[$i]->ID.'" ';
            
            if($itempage !== null)
            {
                if($pages[$i]->ID == $itempage) $out .= ' selected="selected" ';
            }
            
            $out .= '>';
            $out .= $pages[$i]->post_title.' ('.$pages[$i]->ID.')';
            $out .= '</option>';
            
            echo $out;    
        } // for        
        echo '</select></td>';        
    }                 
               
} // class CPMenu
        
        
?>