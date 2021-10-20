<!-- Modal -->
<div class="modal fade" id="singnupModal" tabindex="-1" aria-labelledby="singnupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="singnupModalLabel">Sign Up for an iForum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/php/forum/_signup.php" method="POST">
            <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name= "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name ="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary ">Sign-Up</button>

            </div>
            

        </div>
        
        </form>
    </div>
</div>
</div>