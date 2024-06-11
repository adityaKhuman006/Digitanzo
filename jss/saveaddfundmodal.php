<div class="modal fade" id="addfundmodal" tabindex="-1" role="dialog" aria-labelledby="addfundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"">Buy Gold</h4>
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
                            <label for="name">Amount</label>
                            <input type="text" class="form-control" name="buyingAmount" id="buyingAmount" placeholder="In LKR" required >
                            <span class="text-warning">Min. saving Gold LKR 10,000</span>
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
                        <div class="checkbox">
                            <label><input type="checkbox" value="1" name="confirmation" required> I confirm and buy</label>
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