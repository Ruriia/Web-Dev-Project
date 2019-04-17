<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">KRS Guides</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="alamat.html">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
        </li>
        </ul>
    </div>
    </nav>

    <div class="container-fluid">

        <div class="container" style="border:solid;border-width:thin;border-radius:5px;padding:10px;">

            <h3>Create New Ticket</h3>
            <br/>
            <form action="action_page.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID :</label>
                    <input type="text" class="form-control" name="student_id" placeholder="Student ID" required>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="subject">Subject :</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category">Category :</label>
                            <select class="form-control">
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="priority">Choose Your Priority :</label>
                    <br/>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="low_priority" value="low">
                        <label class="form-check-label" for="low_priority">Low</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="medium_priority" value="medium">
                        <label class="form-check-label" for="medium_priority">Medium</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="high_priority" value="high">
                        <label class="form-check-label" for="high_priority">High</label>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="Textarea1" rows="5"></textarea>
                </div>
                <!--<div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Attach File</label>
                    </div>
                </div>-->
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.html" id="cancel" name="cancel" class="btn btn-secondary">Cancel</a>
            </form>

        </div>

    </div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Flexbox Gang.</p>
</footer>    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>