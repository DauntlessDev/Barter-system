<div class="p-items-container">
    <div>
        <div class="p-items-content">
            <div class="p-items-head">
                <h3>Reviews</h3>
            </div>

            <ul class="p-reviews-body">

                <?php for($x = 0; $x < 10; $x++): ?>
                    <li class="p-reviews-box">
                        <div class="p-review">
                            <div class="p-review-container">
                                <div class="p-reviewer-img-container">
                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                </div>
                                <div class="p-reviewer-info-container">
                                    <div class="p-reviewer-info">
                                        <div class="p-reviewer-name">
                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                        </div>
                                        <div class="p-reviewer-ratings">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star space"></span>
                                                <span>0.00</span>
                                            </div>
                                        </div>
                                        <p class="p-review-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php endfor; ?>
        
            </ul>
            
        </div>
    </div>
</div>