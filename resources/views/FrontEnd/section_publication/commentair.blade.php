  


         <section class="personal-schedule padding-tb">
        <div class="container container-`1310">
            <div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                <h2>Leave A Comment</h2>
                <p>Si vous avez des questions, veuillez nous écrire un message ce que vous voulez savoir </p>
            </div>

            <div class="section-wrapper">
              <div class="accordion-item">
                <div class="accordion-question in">
                  <!--span><i class="fa fa-clock"></i> 8:30 am</span-->
                  <!--h6>Business Market Research</h6-->
                  <i class="fas fa-angle-double-down"></i>
                </div>

        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          
          <div class="col-lg-8 offset-2">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
               
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
            
  <form   action="{{ url('user/publication/commentair/'.$publication->id.'/'.Auth::guard('web')->user()->id) }}"  method="POST" autocomplete="off" enctype="multipart/form-data">
                                    
         @csrf
          <div class="form-inner">
         <textarea name="contenu" rows="8" id="message" placeholder="Your Message" required ></textarea>

                         
           
                      
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">confirmer</button>
           

                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
          
        </div>
       
     
            </div>
        </div>
    </section>
    </section>