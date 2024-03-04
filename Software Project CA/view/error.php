<?php include '../view/header.php'?>

<main>
    <h1>Error Page</h1>
    <section>
        <?php
        $error_msg = filter_input(INPUT_GET, 'msg');
        if ($error_msg === null) {
            // Assuming $error is initialized elsewhere in your code
            echo "Error is :  " . $error;
        } else {
            echo "Error is :  " . $error_msg;
        }
        ?>
    </section>

    <p>
        <a href="../controller/index.php?action=show_home">Return Home</a>
    </p>

</main>
<?php include '../view/footer.php'?>
