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
                                <form>
                                  <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search">
                                    <div class="input-group-btn">
                                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                  </div>
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
                                    @foreach ($dataBuku as $buku )
                                    <tr>
                                     <td>{{ $buku->id }}</td>
                                     <td>{{ $buku->nama_buku }}</td>
                                     <td>{{$buku->tahun_terbit }}</td>
                                     <td>{{$buku->penulis }}</td>
                                     <td class="project-actions">
                                         <form action="{{ route('cart.add') }}" method="post">
                                             @csrf
                                             <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                             <button class="btn btn-primary" type="submit">Tambah</button>
                                         </form>
                                     </td>
                                 </tr>
                                    @endforeach
                                 </tbody>
                                </table>
                                  <!-- pagination -->
                                    <div class="card-footer clearfix">
                                        {{$dataBuku->links()}}
                                    </div>
                                  <!-- end pagination-->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            </section>
        </section>
    </section>
@endsection
