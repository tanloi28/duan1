<?php
include "./view/home/sideheader.php";
?>

<section class="container" style="margin-top: 200px;margin-left: 300px">
    <div class="order-container">
        <?php

        echo "<h2>CHI TIẾT VÉ</h2>";
        extract($loadone_ve);
        echo '<div class="ticket">
                        <div class="ticket-position">
                            <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">CinePass</div> </div>
                            <div class="ticket__inner">
                                <div class="ticket-secondary">
                                    <span class="ticket__item">Mã vé <strong class="ticket__number">' . $id . '</strong></span>
                                    <span class="ticket__item ticket__date">' . $ngay_chieu . '</span>
                                    <span class="ticket__item ticket__time">' . $thoi_gian_chieu . '</span>
                                    <span class="ticket__item">Rạp : <span class="ticket__cinema">CinePass Hà Đông</span></span>
                                    <span class="ticket__item">Phòng : <strong class="ticket__number">' . $tenphong . '</strong></span>
                                    <span class="ticket__item">Người đặt: <span class="ticket__cinema">' . $name . '</span></span>
                                    <span class="ticket__item">Thời gian đặt: <span class="ticket__hall">' . $ngay_dat . '</span></span>
                                    <span class="ticket__item ticket__price" style="margin-top: 5px">Giá: <strong class="ticket__cost">' . number_format($price) . ' vnđ</strong></span>
                                </div>

                                <div class="ticket-primery">
                                     <span class="ticket__item ticket__item--primery ticket__film" style="display:flex;> <strong class="ticket__movie" >PHIM : ' . $tieu_de . '</strong></span>                                    <span class="ticket__item ticket__item--primery">Ghế: <span class="ticket__place">' . $ghe . '</span></span>
                                    <span class="ticket__item ticket__item--primery">Combo: <span class="ticket__place">' . $combo . '</span></span>
                                </div>
                            </div>
                            <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">CinePass</div></div>
                        </div>
                        <div>
                        </div>
                    </div>';


        ?>
        <div class="ticket-control">
            <a href="#" class="watchlist list--print" id="printTicket">In vé</a>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#printTicket").click(function() {
            // Clone the ticket div
            var ticketClone = $(".ticket").clone();

            // Remove unnecessary elements from the clone (e.g., the "In vé" link)
            ticketClone.find(".ticket-control").remove();

            // Create a new window and append the cloned ticket div to it
            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Vé</title></head><body>');
            printWindow.document.write(ticketClone[0].outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            // Print the new window
            printWindow.print();
        });
    });
</script>
