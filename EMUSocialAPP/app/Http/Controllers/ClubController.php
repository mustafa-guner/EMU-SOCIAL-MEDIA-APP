<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ClubController extends Controller{

    function getclubDetails(Request $request){      

        # User Details
        $clubname = "Photography Club";
        $profileimg = "https://scontent.fecn6-1.fna.fbcdn.net/v/t31.18172-8/11406200_10152977119843479_1787168405226911316_o.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=vmSMbXsJNz0AX9z1JgB&_nc_ht=scontent.fecn6-1.fna&oh=00_AfAZVmZQG5_104Fvx-LBuAAe7BmhcjUX3nDRFlhPH3AO0w&oe=63CD98B0";


        # Profile Details
        $desc = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Exercitationem iusto culpa nesciunt ratione minima ea aspernatur 
                quae. Est eum magni, pariatur laborum itaque neque nesciunt 
                obcaecati iusto voluptatibus blanditiis quibusdam!";
        $membernumber = "4232";
        $eventnumber = "169";
        $postnumber = "978";
        $department = "IT";
        $coverimage = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Wikipedia_space_ibiza%2803%29.jpg/800px-Wikipedia_space_ibiza%2803%29.jpg";
        $clubmembers = array(
            array(
                'profileimage' => "https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg",
                'fullname'=> "Fadime Ucangil",
                'username' => "@fadimeucangil",
                'usertype' => "Student"
            ),
            array(
                'profileimage' => "https://media.istockphoto.com/id/1338134336/photo/headshot-portrait-african-30s-man-smile-look-at-camera.jpg?b=1&s=170667a&w=0&k=20&c=j-oMdWCMLx5rIx-_W33o3q3aW9CiAWEvv9XrJQ3fTMU=",
                'fullname'=> "Hasan Reponsiv",
                'username' => "@hasanreponsiv",
                'usertype' => "Admin"
            ),
            array(
                'profileimage' => "https://digitalasset.intuit.com/content/dam/intuit/pcg/en_ca/profile/web/image/photos/grinning-man-with-coffee-image-profile-ca-desktop.jpg",
                'fullname'=> "Peter Kacucam",
                'username' => "@peterkacucam",
                'usertype' => "Assistant"
            ),
            array(
                'profileimage' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnM--P4C62JpX6FJKWbGeGr11tZjjIOu-xXL1cCroW4rh4HSGhJYHXusQzpQ8gG0olYSk&usqp=CAU",
                'fullname'=> "Yasemin Drabez",
                'username' => "@yasemindrabez",
                'usertype' => "Student"
            )
        );
        $commonconnects = array(
            array(
                'profileimage' => "https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg",
                'username' => "@fadimeucangil"
            ),
            array(
                'profileimage' => "https://media.istockphoto.com/id/1338134336/photo/headshot-portrait-african-30s-man-smile-look-at-camera.jpg?b=1&s=170667a&w=0&k=20&c=j-oMdWCMLx5rIx-_W33o3q3aW9CiAWEvv9XrJQ3fTMU=",
                'username' => "@hasanreponsiv"
            ),
            array(
                'profileimage' => "https://digitalasset.intuit.com/content/dam/intuit/pcg/en_ca/profile/web/image/photos/grinning-man-with-coffee-image-profile-ca-desktop.jpg",
                'username' => "@peterkacucam"
            )
        );

        $profile = ["membernumber"=>$membernumber, "eventnumber"=>$eventnumber, "desc"=>$desc,"department"=>$department,"postnumber"=>$postnumber,"coverimage"=>$coverimage,"clubmembers"=>$clubmembers,"commonconnects"=>$commonconnects];
        $user = ["clubname"=>$clubname, "profileimg"=>$profileimg];
       
        # Post Details
        function getpostcontent($user) {
            // $user = Auth::user();
            $posts = array(
                array(
                    'postername' => $user["clubname"], 
                    'posterimage' => "https://scontent.fecn6-1.fna.fbcdn.net/v/t31.18172-8/11406200_10152977119843479_1787168405226911316_o.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=vmSMbXsJNz0AX9z1JgB&_nc_ht=scontent.fecn6-1.fna&oh=00_AfAZVmZQG5_104Fvx-LBuAAe7BmhcjUX3nDRFlhPH3AO0w&oe=63CD98B0",
                    'postdesc' => 'Lorem ipsum dolor sit amet.',
                    'posttime' => '2h ago',
                    'postlikes' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                    'postcomments' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                ),
                array(
                    'postername' => $user["clubname"],
                    'posterimage' => "https://scontent.fecn6-1.fna.fbcdn.net/v/t31.18172-8/11406200_10152977119843479_1787168405226911316_o.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=vmSMbXsJNz0AX9z1JgB&_nc_ht=scontent.fecn6-1.fna&oh=00_AfAZVmZQG5_104Fvx-LBuAAe7BmhcjUX3nDRFlhPH3AO0w&oe=63CD98B0",
                    'postdesc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. agna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                    'posttime' => '5d ago',
                    'postlikes' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                    'postcomments' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                )
            );
            return $posts;
        }

        return view('app/clubpage', ["user"=>$user, "profile"=>$profile, "posts"=>getpostcontent($user)]);
    }
}

// how to use object in array php or laravel