<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 2033 | Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .container {
        padding-top: 20px;
    }
</style>
<body>
    
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="createUser">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username" required>
                            
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your email" required>
                                    
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-3" id="firstName" name="firstName" placeholder="Enter your first name" required>
                                                    
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-3" id="lastName" name="lastName" placeholder="Enter your last name" required>
                          
                            <label for="passwd" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="passwd" name="passwd" placeholder="Enter your Password" required>
                          
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <form action="controller.php" method="GET">
                             <input type="hidden" name="page" value="home">
                             <button type="submit" class="btn btn-secondary">Cancel</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
</div>
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
