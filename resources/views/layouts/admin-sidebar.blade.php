<!-- ========== Left Sidebar Start ========== -->
<?php
    $urls = ["/","/rooms","/teachers","/archive"];
    $classes = ["md md-home","md md-my-library-books","md md-face-unlock"," ion-ios7-box-outline"];
    $desc = ["Dashboard","Rooms","Teachers","Archive"];
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="/img/uploads/{{Auth::user()->avatar}}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->instructor}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="/assessment"><i class="md md-check"></i>Assessment</a></li> -->
                        <li><a href="/userProfile/{{Auth::user()->id}}"><i class="md md-person"></i>User Profile</a></li>
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="md md-settings-power"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
                  <p class="text-muted m-0">Instructor</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <?php $i; for($i = 0;$i < 4;$i++){ ?>
                  <li><a href="<?=url($urls[$i]);?>" class="waves-effect"><i class="<?=$classes[$i];?>"></i><span> <?=$desc[$i];?> </span></a></li>
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
