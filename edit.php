
                                        <!-- The Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idb;?>">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Barang</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="namabarang" value=<?=$namabarang;?> class="form-control"required>
                                                <br>
                                                <textarea class="form-control" rows="5" id="comment" value=<?=$deskripsi;?> name="deskripsi"required></textarea>
                                                <br>
                                                <br>
                                            </div>
                                            <form>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="updatebarang">Tambahkan</button>
                                            </div>
                                            </div>
                                        </div>