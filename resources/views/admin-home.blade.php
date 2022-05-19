@extends('admin.layouts.app')
@section('content')

<section class=" uk-padding-small uk-clearfix">
            <div class="uk_container ">
                   <div class="dash_tile">
                       <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                           <i class="fa fa-bell-o"></i>
                           <h4>Notification</h4>
                           <h2>10</h2>
                           <div><progress class="uk-progress" value="50" max="100"></progress></div>
                       </div>
                       <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                        <i class="fa fa-file-o"></i>
                        <h4>Reports</h4>
                        <h2>10</h2>
                        <div><progress class="uk-progress   progress-green" value="50" max="100"></progress></div>
                    </div>
                    <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                        <i class="fa fa-bullhorn "></i>
                        <h4>Approvals</h4>
                        <h2>10</h2>
                        <div><progress class="uk-progress progress-lightseagreen" value="50" max="100"></progress></div>
                    </div>
                    <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                        <i class="fa fa-calendar"></i>
                        <h4>Upcoming Events</h4>
                        <h2>10</h2>
                        <div><progress class="uk-progress progress-orange" value="50" max="100"></progress></div>
                    </div>
                   </div>
            </div>
        </section>
        
        <section>
            <div class="uk_container">
                <div class="bottom_grid">
                        <div class="col_p">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                              <div class="panel_header"> Notification</div>


                              <div class="uk-overflow-auto table_ct">
                                <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                                   
                                    <tbody>
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star star_icon  star_active "></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur
                                                  <span class="uk-label uk-label-danger">Urgent</span>
                                              </a>
                                           
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
  
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
  
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
  
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
  
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
  
                                        <tr>
                                            <td><input class="uk-checkbox" type="checkbox"></td>
                                            <td> <div> <i class="fa fa-star-o"></i></div></td>
                                            
                                            <td class="uk-table-link">
                                                <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur </a>
                                            </td>
  
                                            <td class="uk-text-nowrap mail_date"> March 5</td>
                                        </tr>
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col_p" >
                        <div class="col uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="panel_header"> General Statics</div>
                        </div>
                    </div>


                    </div>
            </div>
        </section>
@endsection
