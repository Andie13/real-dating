<div class="container">
    <div class="card">
        <div class="card-header">
            Google Recaptcha Code in Codeigniter 3 - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="/formPost" method="POST" enctype="multipart/form-data">
                <div class="text-danger"><strong><?=$this->session->flashdata('flashError')?></strong></div>
   
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
  
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                    
                <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                <br/>
                <button class="btn btn-success">Login</button>
            </form>
        </div>
    </div>
</div>
