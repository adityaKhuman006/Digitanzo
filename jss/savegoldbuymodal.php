<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size:20px; color:#4b0082; font-weight:600">Buy Gold</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="buyGoldForm">
            <div class="modal-body">
                <input type="hidden" name="current_gold_price_in_lkr" value="<?=format_amount($prices['LKR'])?>">
                <input type="hidden" name="current_gold_price_in_usd" value="<?=format_amount($prices['USD'])?>">
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Balance Amount</label><span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_name" value="<?=format_amount($row['user_savings'])?>" readonly></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Amount</label>
                            <input type="text" class="form-control" name="buyingAmount" id="buyingAmount" placeholder="In LKR" required >
                            <span class="text-danger">Min. saving Gold LKR 5,000</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Gold</label>
                            <input type="text" class="form-control" name="buyingGold" id="buyingGold" placeholder="In Grams" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="user_name" value="<?=$row['user_name']?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">NIC</label>
                            <input type="text" class="form-control" name="user_nic" value="<?=$row['user_nic']?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="user_phone" value="<?=$row['user_phone']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Adress</label>
                            <input type="text" class="form-control" name="user_city" value="<?=$row['user_city']?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">District</label>
                            <input type="text" class="form-control" name="user_district" value="<?=$row['user_district']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$row['email']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="checkbox">
                            <label><input type="checkbox" value="1" name="confirmation" required> I have read and agree to the <a href="termsandservices.php"> 
                    Terms and Conditions</a> and <a href="policy.php"> Privacy Policy</a></label>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="buyGoldFormSubmitBtn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
$totalGoldQuery = "SELECT
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) AS totalBoughtGold,
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalWithdrawlGold,
    COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalSellGold,
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) -
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) -
    COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS netGoldBalance
FROM
    tb_user_gold_transation
WHERE 
    user_id = {$row['user_no']}";

?>
<div class="modal fade" id="sellModal" tabindex="-1" role="dialog" aria-labelledby="sellModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size:20px; color:#4b0082; font-weight:600">Sell Gold</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form method="post" id="sellGoldForm">
                <div class="modal-body">
                    <input type="hidden" name="current_gold_price_in_lkr" value="<?=format_amount($prices['LKR'])?>">
                    <input type="hidden" name="current_gold_price_in_usd" value="<?=format_amount($prices['USD'])?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Balance Amount</label><span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_name" value="<?=format_amount($totalGold['netGoldBalance'])?>" readonly></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Gold</label>
                                <input type="number" class="form-control" name="sell_gold" id="sellGold" placeholder="In Grams" min="0.0000000000000000000000001" step="0.00000000000001" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Amount</label>
                                <input type="text" class="form-control" name="sell_amount" id="sellAmount" placeholder="In LKR" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="confirmation" required> I have read and agree to the <a href="termsandservices.php">
                                        Terms and Conditions</a> and <a href="policy.php"> Privacy Policy</a></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="sellGoldFormSubmitBtn">Submit</button>
                </div>

                <div class="modal fade" id="conformationModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="staticBackdropLabel">Sell Gold</h5>
                                <span type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</span>
                            </div>
                            <div class="modal-body model-conformation-text">
                                are you sure you want to sell gold ?
                            </div>
                            <div class="modal-body user-data d-none">
                                <div>
                                    <span>User name :</span>
                                    <span class="user-name"></span>
                                </div>
                                <div>
                                    <span>Reference Id :</span>
                                    <span class="reference-id">7894561230</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="action" class="btn btn-primary">Sell</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>