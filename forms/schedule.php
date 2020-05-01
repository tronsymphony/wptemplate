

    <section class="request-appointment">
        <div class="container">
                    <div class="content">
                        
                        <div class="titlecontent">
                            <h2 class="sec-title">Complimentary Consultation
                                and Skin Assessment</h2>
                                <p>Ready to get even more beautiful than you already are?</p>
                        </div>
                        <div class="context ">
                            

                         

                            <div class="formhover">
                                <form id="schedule" name="scheduleform" class="img-shadow appointment-wrapper">
                                    <div class="formpwrap">
                                        <!-- Name -->
                                        <div class="input">
                                            <input type="text" name="name" placeholder="name" class="form-control" required="">
                                        </div>
                                                                                <!-- Preferred Day -->
                                                                                <div class="input">
                                            <select name="preferred_day" class="form-control" required="">
                                                <!-- <input type="date" class="form-control" id="start" name="preferred_day" pattern="\d{1,2}/\d{1,2}/\d{4}" required> -->
                                                <option value="" disabled="" selected="">Preferred Day + Time</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                            </select>   
                                        </div>

                                        <!-- Email -->
                                        <div class="input">
                                            <input type="text" name="email" placeholder="email" class="form-control" required="">
                                        </div>
                                        <div class="input">

                                        <select name="preferred_time" placeholder="Preferred Time" class="form-control">
                                            <option value="" disabled="" selected="">Preferred Time</option>
                                            <option value="Early Morning">Early Morning</option>
                                            <option value="Late Morning">Late Morning</option>
                                            <option value="Early Afternoon">Early Afternoon</option>
                                            <option value="Late Afternoon">Late Afternoon</option>
                                        </select>
                                        </div>
                                                                                
                                        <!-- Phone -->
                                        <div class="input">
                                            <input type="text" placeholder="Phone" name="phone" class="form-control">
                                        </div>
                                       

             


                                        <div class="input">

                                                    <select name="treatment" class="form-control">
                                                        <option value="" disabled="" selected="">Body Sculpting Treatment (Optional)</option>
                                                                        <?php
                                                                            $loop = new WP_Query( array( 'post_type' => 'treatments', 'posts_per_page'=> -1, 'orderby'=> 'name','order'=>'ASC') );
                                                                            if ( $loop->have_posts() ) :
                                                                                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                                                                
                                                                                            
                                                                                            <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                                                                                <?php endwhile;
                                                                                if (  $loop->max_num_pages > 1 ) : ?>
                                                                                
                                                                                <?php endif;
                                                                            endif;
                                                                            wp_reset_postdata();
                                                                        ?>
                                                    </select>
                                                
                                        </div>
                                         





                                        <!-- Submit Button -->
                                        <div class="f-submit" style="">
                                            <button type="submit" class="ui-btn ui-submit ui-orange">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            
                        </div>
                    </div>
        </div>
    </section>
