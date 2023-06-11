<?php // Template Name: Rezerwacja
?>

<?php get_header(); ?>
<section class="container">
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
          method="post">
        <input type="hidden"
               name="action"
               value="process_payment">

        <p>
            <label for="name">Name:</label><br>
            <input type="text"
                   name="name"
                   required>
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input type="email"
                   name="email"
                   required>
        </p>

        <p>
            <label for="amount">Amount:</label><br>
            <input type="number"
                   name="amount"
                   required>
        </p>

        <p>
            <input type="submit"
                   value="Pay Now">
        </p>
    </form>
</section>
<?php get_footer(); ?>