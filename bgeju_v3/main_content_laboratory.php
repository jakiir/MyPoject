                        
           <div class="tabs">
                <div class="tab-menu">
                    <ul>
                        <li><a href="#tab1">Members</a></li>
                        <li><a href="#tab2">Publication </a></li>
                        <li><a href="#tab3">Event </a></li>
                        <li><a href="#tab4">Contact </a></li>
                    </ul>
                	<div class="clear"></div>
                </div>
            <!-- .tab-menu (end) -->
            
                <div class="tab-wrapper"> <!-- .tab-wrapper (start) -->
                        <div style="display: block;"class="tab" align="justify">
                             <h2> Lab Name</h2>
                             <div><img src="<?php bloginfo('template_url'); ?>/images/2015.jpg" width="720" height="200"/></div>
                             
                             <p align="justify">
                             	Sampole text Sampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole textSampole text
                             
                             </p>
                             
                             
                        </div><!-- .tab (end) --> 
                        
                        <div style="display: block;" id="tab1" class="tab">
                              <?php include_once('include/laboratory_member.php');?>							  
                        </div><!-- .tab (end) --> 

                        <div style="display: none;" id="tab2" class="tab">
                               
                                <?php include_once('include/laboratory_publication.php');?>
                        
                        </div><!-- .tab (end) -->
                
                        <div style="display: none;" id="tab3" class="tab">
                               
                               <?php include_once('include/laboratory_event.php');?>
                        
                        </div><!-- .tab (end) -->
                
                        <div style="display: none;" id="tab4" class="tab">
                               
                               <?php include_once('include/laboratory_contact_form.php');?>           
                        </div><!-- .tab (end) -->
                
                </div><!-- .tab-wrapper (end) -->
            
            </div><!-- .tabs (end) -->
        

