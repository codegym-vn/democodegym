<?php include_once 'header.php' ?>
<?php include_once 'ContactDB.php' ?>

<?php
    $contactDB = new ContactDB();
    $contacts = $contactDB->getAll();
?>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <?php if(count($contacts) > 0): ?>
                <table class="table">
                    <tr>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($contacts as $contact):?>
                        <tr>
                            <td><?php echo $contact->first_name; ?></td>
                            <td><?php echo $contact->last_name; ?></td>
                            <td><?php echo $contact->phone; ?></td>
                            <td><?php echo $contact->email; ?></td>
                            <td><?php echo $contact->address; ?></td>
                            <td>
                                <a href="remove.php?id=<?php echo $contact->id; ?>">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            <?php else: ?>
                <h3>No contacts found!</h3>

            <?php endif; ?>
        </div>
    </div>
<?php include_once 'footer.php' ?>