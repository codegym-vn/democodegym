<?php include_once 'header.php' ?>
<?php include_once 'Contact.php' ?>
<?php include_once 'ContactDB.php' ?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new ContactDB();
    $term = $_POST['s'];
    $contacts = $db->search($term);
}
?>

    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <form  class="form-inline" method="post">
                <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="s"/>
                </div>
                <div class="form-group form-group-lg">
                    <input type="submit" value="Search" class="form-control"/>
                </div>
            </form>
        </div>
        <div class="col-xs-8 col-xs-offset-2">
            <?php if(count($contacts) > 0): ?>
                <table class="table">
                    <tr>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    <?php foreach ($contacts as $contact):?>
                        <tr>
                            <td><?php echo $contact->first_name; ?></td>
                            <td><?php echo $contact->last_name; ?></td>
                            <td><?php echo $contact->phone; ?></td>
                            <td><?php echo $contact->email; ?></td>
                            <td><?php echo $contact->address; ?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
            <?php else: ?>
                <h3>No contacts found!</h3>
            <?php endif; ?>
        </div>
    </div>
<?php include_once 'footer.php' ?>