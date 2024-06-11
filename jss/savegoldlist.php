<?php
    $query = "SELECT * FROM tb_user_gold_transation WHERE user_id = {$row['user_no']} order by date desc";
    $res = mysqli_query($db, $query);
    if (mysqli_num_rows($res) > 0):
?>
    <div class="row justify-content-center">
        <div class="col-12">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Gold(In Grams)</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($tranaction = mysqli_fetch_assoc($res)): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= format_amount($tranaction['buying_amount']); ?></td>
                            <td><?= format_amount($tranaction['gold_in_grams']); ?></td>
                            <td>
                                <?= ucfirst($tranaction['action']); ?>
                                <?php if ($tranaction['action'] == 'withdrawl' || $tranaction['action'] == 'sell') :?>
                                    <?php if ($tranaction['is_approved'] == '1' ): ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php elseif ($tranaction['is_approved'] == '2' ): ?>
                                        <span class="badge badge-danger">Canceled</span>
                                    <?php else:?>
                                        <span class="badge badge-warning">Not approved</span>
                                    <?php endif?>
                                <?php endif?>
                            </td>
                            <td><?= $tranaction['date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
<?php endif; ?>