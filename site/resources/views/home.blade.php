{{-- views/home --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links']])

<!-- Header -->
<header id="top" class="header site-header">
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
             <i class="fa fa-database fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>SQL + NoSQL</strong>
             </h4>
             <p>I'm comfortable working with both SQL and NoSQL databases and have specific experience designing, implementing, and utilizing databases in MySQL and MongoDB.</p>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-terminal fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>CLI Fluent</strong>
             </h4>
             <p>Whether it's writing a bash script to manage database migrations, working with the AWS CLI during deployment and troubleshooting, or testing new features I'm at home on the command line.</p>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-desktop fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>HTML/JS/CSS</strong>
             </h4>
             <p>I'm no stranger to front end development. I'm proficient in JavaScript, having used it both in the development of an API with Node.js, Express, and Mongoose ODM as well as with an Ember.js client used to interact with that API.  I know my way around a stylesheet, the latest HTML5 features, and several templating engines.</p>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="service-item">
             <span class="fa-stack fa-4x">
             <i class="fa fa-circle fa-stack-2x"></i>
             <i class="fa fa-gears fa-stack-1x text-blue"></i>
           </span>
             <h4>
               <strong>REST</strong>
             </h4>
             <p>I have experience developing a RESTful API allowing users to create and manage content, interactions, and relationships.  I've implemented endpoints and services that handled text and photo storage, realtime notifications, retrieval of a feed, user action logging, comments, and account management.</p>
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
   <h1>We can accomplish more together</h1>
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
             <a href="https://rankopolis.com" target="_blank">
               <img class="img-portfolio img-responsive" src="img/rankopolis/rankopolis-logo.jpg">
             </a>
           </div>
         </div>
         <div class="col-md-6">
           <div class="portfolio-item">
             <a href="http://islandequineproducts.com/" target="_blank">
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
       <a href="/blogs" class="btn btn-lg btn-square btn-light">Blog</a>
       <a href="/links" class="btn btn-lg btn-square btn-dark">Links</a>
     </div>
   </div>
 </div>
</aside>


@endsection
