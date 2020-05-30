<?php include_once 'header.php' ?>
<?php include_once 'Contact.php' ?>
<?php include_once 'ContactDB.php' ?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = new ContactDB();

        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $contact = new Contact(0, $first_name, $last_name, $phone, $email, $address);

        $result = $db->create($contact);

        if($result) {
            $message = "Contact was created successfully";
        } else {
            $message = "Error creating contact";
        }
    }
?>

    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <h1>Add new contact</h1>
            <?php if(isset($message)):?>
                <h3 class="text-danger"><?php echo $message; ?></h3>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first-name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last-name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Search" class="form-control btn-success"/>
                </div>
            </form>
        </div>
    </div>
<?php include_once 'footer.php' ?>