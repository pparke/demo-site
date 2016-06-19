@extends('layouts.app')

@section('content')

<!-- Header -->
<header id="top" class="header">
 <div class="text-vertical-center">
   <h1>Philip Parke</h1>
   <h3>Backend Web Developer</h3>
   <br>
   <a href="#about" class="btn btn-square btn-dark btn-lg">About Me</a>
 </div>
</header>

<!-- About -->
<section id="about" class="about">
 <div class="container">
   <div class="row">
     <div class="col-lg-12 text-center">
       <h2>I build web APIs and the services that make them great</h2>
       <p class="lead">I've developed for the server side using both PHP/SQL and JavaScript/MongoDB but I always welcome the chance to learn something new. If you're looking for a team member who can bring both his current skills to the table and quickly integrate new ones, feel free to <a href="#contact">contact me.</a></p>
     </div>
   </div>
   <!-- /.row -->
 </div>
 <!-- /.container -->
</section>

<!-- Services -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<section id="services" class="services bg-blue">
 <div class="container">
   <div class="row text-center">
     <div class="col-lg-10 col-lg-offset-1">
       <h2>Skills</h2>
       <hr class="small">
       <div class="row">
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-cloud fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>Skill Name</strong>
             </h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
             <a href="#" class="btn btn-square btn-light">Learn More</a>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-compass fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>Skill Name</strong>
             </h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
             <a href="#" class="btn btn-square btn-light">Learn More</a>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-flask fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>Skill Name</strong>
             </h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
             <a href="#" class="btn btn-square btn-light">Learn More</a>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-shield fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>Skill Name</strong>
             </h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
             <a href="#" class="btn btn-square btn-light">Learn More</a>
           </div>
         </div>
       </div>
       <!-- /.row (nested) -->
     </div>
     <!-- /.col-lg-10 -->
   </div>
   <!-- /.row -->
 </div>
 <!-- /.container -->
</section>

<!-- Callout -->
<aside class="callout">
 <div class="text-vertical-center">
   <h1>Vertically Centered Text</h1>
 </div>
</aside>

<!-- Portfolio -->
<section id="portfolio" class="portfolio">
 <div class="container">
   <div class="row">
     <div class="col-lg-10 col-lg-offset-1 text-center">
       <h2>Portfolio</h2>
       <hr class="small">
       <div class="row">
         <div class="col-md-6">
           <div class="portfolio-item">
             <a href="#">
               <img class="img-portfolio img-responsive" src="img/rankopolis/rankopolis-logo.jpg">
             </a>
           </div>
         </div>
         <div class="col-md-6">
           <div class="portfolio-item">
             <a href="#">
               <img class="img-portfolio img-responsive" src="img/iep/iep-logo.png">
             </a>
           </div>
         </div>
       </div>
       <!-- /.row (nested) -->
     </div>
     <!-- /.col-lg-10 -->
   </div>
   <!-- /.row -->
 </div>
   <!-- /.container -->
</section>

<!-- Call to Action -->
<aside class="call-to-action bg-slate">
 <div class="container">
   <div class="row">
     <div class="col-lg-12 text-center">
       <h3>Feel free to take a look around.</h3>
       <a href="/blog" class="btn btn-lg btn-square btn-light">Blog</a>
       <a href="#" class="btn btn-lg btn-square btn-dark">Notes</a>
     </div>
   </div>
 </div>
</aside>


@endsection
