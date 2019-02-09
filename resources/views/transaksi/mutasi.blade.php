@if(count($result))
    <table class="table table-striped mt-3" id="myTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody> 
                @php
                $no = 1;
                    $subtotal_plg = $subtotal_thn = $total = $bunga = 0;
                    foreach ($result as $key => $row)
                    {
                        $bunga_perbulan=6/12;
                        
                        $subtotal_plg += $row['nominal'];
                        if($row["jenis"] == "kredit"){
                            $subtotal_thn += $row['nominal'];
                        }
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row['user']['name']."</td>";
                        echo "<td>".$row['jenis']."</td>";
                        echo "<td>Rp. ".$row['nominal']."</td>";
                        echo "<td>".$row['created_at']."</td>";
                        echo  "</tr>";
                            $bunga  =  $subtotal_thn*$bunga_perbulan/100;
                            if (@$result[$key+1]['bulan'] != $row['bulan']) {
                                $total += $subtotal_thn-$bunga;
                                echo '<tr>
                                    <th colspan="3" class="text-left"> Bulan ke ' . $row['bulan'] . '</th>
                                    <th>Rp.'.number_format ($subtotal_thn, 0, ',', '.').'</th><td></td>
                                </tr>';
                                echo '<tr>
                                    <th colspan="3" class="text-left"> Bunga </th>
                                    <th>Rp. '.number_format ($bunga, 0, ',', '.').'</th><td></td>
                                </tr>';
                                echo '<tr>
                                    <th colspan="3" class="text-left"> Sub Total </th>
                                    <th>'.number_format ($subtotal_thn-$bunga, 0, ',', '.').'</th><td></td>
                                    
                                </tr>';
                                    $subtotal_thn = 0;
                                } 
                                if($row['jenis'] == "debit"){
                                    echo $total = $total-$row['nominal'];
                                }  
                    }
                    
                    echo '<tr class="total">
                            <th colspan="3">GRAND TOTAL</th>
                            <td> ' .number_format ($total, 0, ',', '.'). '</td><td></td>
                        </tr>';
                @endphp
                </tbody>
            </table>
    @else
            <h4>Tidak Ada Mutasi</h4>
    @endif