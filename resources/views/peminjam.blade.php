@extends('layouts.admin')

@section('title', 'Dashboard')

@section('sidebar')
    @parent
@endsection

@section('content')
    <section class="section">
        <section class="">
                     <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h4>Tabel Daftar Peminjaman Buku</h4>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-striped">
                                  <tr>
                                    <th>No.</th>
                                    <th>Peminjam</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                  <tbody>
                                    @foreach ($peminjam as $p)
                                    <tr>
                                        <th>{{$loop->iteration }}</th>
                                        <th>{{$p['user']['name']}}</th>
                                        <th>{{$p['user']['email']}}</th>
                                        <td class="project-action">

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihat{{$p['id']}}">
                                            Lihat
                                        </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            </section>
        </section>
    </section>
@endsection


@push('modals')
@foreach ($peminjam as $p)
    <div class="modal fade" id="lihat{{$p['id']}}" tabindex="-1" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="table-responsive">
                      <table class="table">
                          <tr>
                              <th>Nama Buku</th>
                              <th>Tahun Terbit</th>
                              <th>Penulis</th>
                          </tr>
                          @foreach ($p['buku'] as $b)
                          <tr></tr>
                            <td>{{$b['nama_buku']}}</td>
                            <td>{{$b['tahun_terbit']}}</td>
                            <td>{{$b['penulis']}}</td>
                          </tr>
                          @endforeach
                      </table>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
@endforeach
@endpush
