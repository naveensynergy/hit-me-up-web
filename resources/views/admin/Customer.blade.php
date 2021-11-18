@extends('admin.layouts')
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active"
    style="transform: translate3d(0px, 0px, 0px);">
    <div class="container" style="padding-top: 170px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Customer Details</h1>
            </div>
        </div>
    </div>
    <div class="header-filter header-filter-gradient"></div>
</div>
<div class="main  main-raised ">
    <div class="blog-post ">
        <div class="container">


            <article id="post-4381" class="section section-text">
                <div class="row">
                    <div class="col-md-12 page-content-wrap table-responsive ">
                            
                                <table class="table table-bordered ">
                                  <thead>
                                    <tr>
                                      <th scope="col">Day</th>
                                      <th scope="col">Article Name</th>
                                      <th scope="col">Author</th>
                                      <th scope="col">Shares</th>
                                      <th scope="col">Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>Bootstrap 4 CDN and Starter Template</td>
                                      <td>Cristina</td>
                                      <td>2.846</td>
                                      <td>
                                        <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                      <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2</th>
                                      <td>Bootstrap Grid 4 Tutorial and Examples</td>
                                      <td>Cristina</td>
                                      <td>3.417</td>
                                      <td>
                                        <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                      <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">3</th>
                                      <td>Bootstrap Flexbox Tutorial and Examples</td>
                                      <td>Cristina</td>
                                      <td>1.234</td>
                                      <td>
                                        <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                      <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                           

                       
                    
                </div>
            </article>
        </div>
    </div>
    <footer class="footer footer-black footer-big">
        <div class="container">
            <div class="hestia-bottom-footer-content">
                <div class="copyright pull-right">
                    <a href="mailto:youremailaddress">contact us | </a>

                    <a href="#"> about hitmeuplocal</a>
                </div>
            </div>
        </div>
    </footer>
</div>


@endsection