<?php if ( isset( $this->session->register_succcess ) ): ?>
    <div class="alert alert-success">
        <div class="alert-heading">
            <?= $this->session->register_success; ?>
        </div>
    </div>
<?php endif; ?>