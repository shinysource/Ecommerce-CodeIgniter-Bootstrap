<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<div id="contacts">
    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        <?= lang('contact_us') ?> <small><?= lang('contact_us_feel_free') ?></small></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                if ($this->session->flashdata('resultSend')) {
                    ?>
                    <hr>
                    <div class="alert alert-info"><?= $this->session->flashdata('resultSend') ?></div>
                    <hr>
                <?php }
                ?>
                <div class="well well-sm">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        <?= lang('name') ?></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        <?= lang('email_address') ?></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        <?= lang('subject') ?></label>
                                    <input type="text" name="subject" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        <?= lang('message') ?></label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="<?= lang('message') ?>"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    <?= lang('send_message') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> <?= lang('our_office') ?></legend>
                    <address>
                        <?= $contactsPage ?>
                    </address>
                </form>
            </div>
        </div>
    </div>
    <div id="map"></div>
    <?php $coordinates = explode(',', $googleMaps); ?>
    <script>
        function initMap() {
            var myLatLng = {lat: <?= $coordinates[0] ?>, lng: <?= $coordinates[1] ?>};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
</div>