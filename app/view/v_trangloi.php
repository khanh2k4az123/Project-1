

<div class="container">
    <div class="row">
        <?php if(isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['loi']?>
                
            </div>
        <?php endif; unset($_SESSION['loi']); ?>
    </div>
</div>