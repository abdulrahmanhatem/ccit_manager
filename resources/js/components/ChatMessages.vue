<template>
  <div>
      <div  v-for="messege in messeges" :key="messege.id" >

        <div class="d-flex flex-column mb-5 align-items-start" v-if="messege.user_id == user.id">
          <div class="d-flex align-items-center" >
            {{messege.user_id}}
              <div class="symbol symbol-circle symbol-40 mr-3">
                  <img class="" src="" alt="photo" />
              </div>
                <a href="" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"></a>
               </div> 
                <!-- <span class="text-muted font-size-sm">{{Helper::since($msg->created_at)}}</span>                          -->
                                                
                                                   
                                                          
<!--                                                         
                                                            
                                                        
                                                            {{$project->user->name}}</a>
                                                            
                                                        </div>
                                                    @else
                                                    <div>
                                                        @if ($msg->user->role->name == 'customer')
                                                            <a href="{{url('customers/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @elseif ($msg->user->role->name == 'team')
                                                            <a href="{{url('team/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @elseif ($msg->user->role->name == 'admin')   
                                                            <a href="{{url('admins/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @endif
                                                        <span class="text-muted font-size-sm">{{Helper::since($msg->created_at)}}</span>
                                                    
                                                        {{$project->user->name}}</a>
                                                        
                                                    
                                                        @if (Helper::avatarCheck($project->user->avatar))
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img class="" src="{{asset('uploads/images/avatars/'.$project->user->avatar)}}" alt="photo" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-circle symbol-40 ml-3 flex-shrink-0 symbol-light-primary ">
                                                                <span class="symbol-label font-size-h4">
                                                                    {{$project->user->name[0]}}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @endif
                                                   
                                                   
                                                </div>
                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">{{$msg->messege}}</div>
                                                @if (Helper::FileExists($msg->docs, 'uploads/files/messeges'))
                                                    <div class="d-flex flex-column font-size-sm font-weight-bold">
                                                        <a href="{{url('uploads/files/messeges/'. $msg->docs)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1" style="max-height: 40px;overflow: hidden;">
                                                        <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>{{$msg->docs}}</a>
                                                    </div>
                                                @endif
                                            </div>
                                    @endforeach  --> 
          
        </div>
      </div>
  </div>

</template>

<script type="application/javascript">
  export default {
     props: [
            'messeges', 'user'
        ] ,
  };
</script>