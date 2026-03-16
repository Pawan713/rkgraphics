
    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_01.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_02.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_03.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_04.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_05.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('assets/images/logo_06.png')}}" alt="" class="img-repsonsive"></a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>About US</h3>
                    </div>
                    <p> RK Graphics specializes in various graphic design services, including ID card design. They offer personalized ID card designs for a variety of purposes, focusing on creating visually appealing and functional designs. Their services extend to other areas like ID Card & Belts,All Types Of Printing Services, and business cards.</p>   
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul><!-- end links -->
                    </div>						
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Information Link</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        {{-- <li><a href="#">Blog</a></li> --}}
                        <li><a href="{{route('pricing')}}">Pricing</a></li>
                        <li><a href="{{route('about_us')}}">About</a></li>
                        <li><a href="{{route('contact_us')}}">Contact</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="mailto:#">info@rkgraphicss.com</a></li>
                        <li><a href="#">www.rkgraphicss.com</a></li>
                        <li>Rasda Patratu Ramgarh,Jharkhand</li>
                        <li>+91 9934125681</li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-center">                   
                <p class="footer-company-name">All Rights Reserved. &copy; {{date('Y')}} <a href="#">R.K.Graphics</a> Design By : <a href="">Pawan's Code & Labs</a></p>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
<script src="{{asset('assets/js/all.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/timeline.min.js')}}"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>





<?php if (session()->get('success')): ?>
<script>
    $(document).ready(function(){
           Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    });
</script>
<?php elseif (session()->get('error')): ?>
<script type="text/javascript">
    $(document).ready(function() {
           Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            // text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    });
</script>
<?php endif; session()->forget(['success','error']); ?>


@stack('script')
</body>
</html>