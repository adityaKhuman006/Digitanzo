<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size:20px; color:#4b0082; font-weight:600">Withdraw Gold</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="withdrawGoldForm">
            <div class="modal-body">
                <input type="hidden" name="current_gold_price_in_lkr" value="<?=format_amount($prices['LKR'])?>">
                <input type="hidden" name="current_gold_price_in_usd" value="<?=format_amount($prices['USD'])?>">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Your gold balance</label>
                            <input type="text" class="form-control" placeholder="In Grams" readonly value="<?= format_amount($totalGold['netGoldBalance']) ?> g">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Amount</label>
                            <select class="form-control" name="withdrawingGold" id="withdrawingGold" required >
                                <option value="8">8</option>
                                <option value="40">40</option>
                                <option value="80">80</option>
                                <option value="320">320</option>
                                <option value="400">400</option>
                                <option value="600">600</option>
                                <option value="1000">1000</option>
                            </select>
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
                            <label for="name">NIC/Passport no</label>
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
                       <div>
                    <input type="checkbox" name="checkbox" value="check" id="agree" required="reruired" /> I have read and agree to the <a href="termsandservices"> Terms and Conditions</a> and <a href="localhost/digitanzo/jss/termsandservices"> Privacy Policy</a>
                    </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="withdrawGoldFormSubmitBtn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>