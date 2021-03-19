<div class="wrapper">
    <div class="main-container">
        <form class="form" action="<?= route_to('placeOffer') ?>" method="POST" id="placeOffer-form" enctype="multipart/form-data">
            <div class="whole_contents">
                <div class="head">
                    <div class="title">
                        <h1 class="offer-title">Place Offer</h1>
                    </div>
                    <div class="validation-box">
                        <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata
                        ?>
                        <?php if (session()->getFlashdata('msg') !== null) : ?>
                            <div>
                                <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
                            </div>
                        <?php endif; ?>
                        <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display 
                        ?>
                        <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>
                    </div>
                    <div class="subject">
                        <h2 class="subject_header">Subject</h2>
                        <input type="text" class="offer_subject" name="offer_subject" id="offer_subject" placeholder="Insert message subject">
                    </div>
                </div>

                <div class="body">
                    <div class="title">
                        <h2 class="offer-message-title">Message</h2>
                    </div>
                    <div class="message-body">
                        <textarea class="message_area" name="message" id="" cols="30" rows="10" placeholder="Insert your message here"></textarea>
                    </div>
                </div>
                <div class="offer">
                    <button class="place_button" type="submit" form="placeOffer-form" value="submit">Place Offer</button>
                </div>
            </div>
        </form>
    </div>
</div>