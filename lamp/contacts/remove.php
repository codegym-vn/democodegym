<?php ob_start();?>
<?php include_once 'Contact.php' ?>
<?php include_once 'ContactDB.php' ?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $db = new ContactDB();
    $id = $_GET['id'];

    $contact = $db->get($id);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new ContactDB();

    $id = $_POST['id'];

    $result = $db->remove($id);

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header('Location: http://'.$host.$uri.'/list.php');
}
?>

<?php include_once 'header.php' ?>

    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <?php if(isset($contact)): ?>
                <h3>Do you want to delete the following contact?</h3>
                <table class="table">
                    <tr>
                        <td>First name:</td>
                        <td><?php echo $contact->first_name; ?></td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td><?php echo $contact->last_name; ?></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><?php echo $contact->phone; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $contact->email; ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $contact->address; ?></td>
                    </tr>
                </table>
                <form  class="form-inline" method="post">
                    <input type="hidden" name="id" value="<?php echo $contact->id;?>"/>
                    <div class="form-group form-group-lg">
                        <input type="submit" value="Remove" class="form-control"/>
                    </div>
                    <div class="form-group form-group-lg">
                        <a href="index.php" class="form-control btn btn-default">Cancel</a>
                    </div>
                </form>
            <?php else:  ?>
                <h3>Contact not found!</h3>
            <?php endif; ?>

        </div>
    </div>
<?php include_once 'footer.php' ?>