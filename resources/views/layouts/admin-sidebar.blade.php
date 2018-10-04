<!-- ========== Left Sidebar Start ========== -->
<?php
    $urls = ["/","/rooms","/teachers"];
    $classes = ["md md-home","md md-my-library-books","md md-face-unlock"];
    $desc = ["Subjects","Rooms","Teachers"];
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="user-info">
                <div class="dropdown">
                    <p class="dropdown-toggle">{{Auth::user()->instructor}}</p>
                </div>
                  <p class="text-muted m-0">Secretary</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <?php $i; for($i = 0;$i < 3;$i++){
                    if($i == 0){?>
                  <li class="has_sub">
                    <a class="waves-effect"><i class="<?=$classes[$i];?>"></i><span> Dashboard </span></a>
                    <ul>
                        <li><a href="<?=url($urls[$i]);?>" class="waves-effect"><i class="md md-folder"></i><span> Subject Schedules </span></a></li>
                        <li><a href="{{url('/roomsassign')}}"><i class="md md-assignment-turned-in"></i><span> Room Assignments </span></a></a></li>
                    </ul>
                  </li>
                <?php }else{ ?>
                  <li><a href="<?=url($urls[$i]);?>" class="waves-effect"><i class="<?=$classes[$i];?>"></i><span> <?=$desc[$i];?> </span></a></li>
                <?php } }?>
                <li>
                    <a href="{{url('/logout')}}">
                        <i class="md md-settings-power"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
