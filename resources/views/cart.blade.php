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
                              <h4>Tabel Daftar Buku</h4>
                              <div class="card-header-form">
                                <form action="{{ route('peminjam.add') }}" method="post" enctype="multipart/form">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-tag"><span> Checkout</span></i></button>
                                </form>
                              </div>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-striped">
                                  <tr>
                                    <th>No.</th>
                                    <th>Nama Buku</th>
                                    <th>Tahun Terbit</th>
                                    <th>Penulis</th>
                                    <th>Action</th>
                                  </tr>
                                  <tbody>
                                    @foreach ($carts as $c)
                                    <tr>
                                        <th>{{$loop->iteration }}</th>
                                        <th>{{$c['buku']['nama_buku']}}</th>
                                        <th>{{$c['buku']['tahun_terbit']}}</th>
                                        <th>{{$c['buku']['penulis']}}</th>
                                        <td class="project-action">
                                            <a href="{{ route('cart.destroy', $c['id']) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
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
