<!-- <div style="width: 320px; margin: 0 auto;">
   <h3>Login</h3>
   <? if (!empty($error)): ?>
      <div class="alert alert-error">
         <b>Error!</b> <?= $error ?>
      </div>
   <? elseif (!empty($info)): ?>
      <div class="alert alert-info">
         <b>Info.</b> <?= $info ?>
      </div>
   <? endif; ?>
   <form class="well" method="POST" action="<?php echo site_url('/login') ?>">
      <label>Username</label>
      <input type="text" name="email" style="width: 260px;" <? if (!empty($username)): ?> value="<?= $username ?>" <? endif; ?>>
      <label>Password</label>
      <input type="password" name="password" style="width: 260px;">
      <button type="submit" class="btn btn-primary">Login</button>
   </form>
</div> -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>OARS: IIT Kanpur</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

   <script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   <style type="text/css">

   /* Sticky footer styles
   -------------------------------------------------- */

   html,
   body {
      height: 100%;
      /* The html and body elements cannot have any padding or margin. */
   }

   /* Wrapper for page content to push down footer */
   #wrap {
      min-height: 100%;
      height: auto !important;
      height: 100%;
      /* Negative indent footer by it's height */
      margin: 0 auto -60px;
   }

   /* Set the fixed height of the footer here */
   #push,
   #footer {
      height: 60px;
   }
   .credit {
      background-color: #f5f5f5;
   }

   /* Lastly, apply responsive CSS fixes as necessary */
   @media (max-width: 767px) {
      #footer {
         margin-left: -20px;
         margin-right: -20px;
         padding-left: 20px;
         padding-right: 20px;
      }
   }



   /* Custom page CSS
   -------------------------------------------------- */
   /* Not required for template or sticky footer method. */

   #wrap > .container {
      padding-top: 60px;
   }
   .container .credit {
      margin: 20px 0;
   }

   code {
      font-size: 80%;
   }
   .subheading {
      color: #e5e5e5;
   }
   </style>

</head>
<body>
   <div class="row-fluid">
      <div class="span5 offset3" id="login">
       <div class="well">
         <form class="form-horizontal" action="<?php echo site_url('/login') ?>" method="POST">
         <fieldset>
            <legend class="">Login</legend>   
            <div class="control-group">
               <label class="control-label"  for="username">Username</label>
               <div class="controls">
                 <input type="text" id="username" name="email" placeholder="" class="input-xlarge">
              </div>
           </div>

           <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
           </div>
        </div>


        <div class="control-group">
         <!-- Button -->
         <div class="controls">
           <button role="button" class="btn btn-success">Login</button>
        </div>
     </div>
  </fieldset>
</form>                
</div>

</div>
<!-- Add footer nav here -->
</div>
</div>
</body>
</html>
