<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome', $data); ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row my-3">
                            <h4 class="text-center">SEARCH PATIENTS</h4>
                        </div>
                        <div class="row">
                            <form>
                                <input type="search" name="search" id="live_search" class="form-control" placeholder="Search...">
                            </form>
                        </div>
                        <div class="col-lg-12 table-responsive" id="search_results">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>
<script>
    $('#live_search').keyup(function() {
        var input = $(this).val();
        if (input != '') {
            $.ajax({
                url: "<?= ROOT ?>/patients",
                method: "POST",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#search_results").html(data);
                }
            })
        } else {
            $("#search_results").css("display", "none");
        }
    });
</script>