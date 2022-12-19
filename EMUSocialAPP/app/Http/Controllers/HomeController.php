<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller{

    function gethomeDetails(Request $request){      

        # User Details
        $firstname = "James";
        $lastname = "Robert";
        $fullname = $firstname . " " . $lastname;
        $username = "@jamesrobert";
        $profileimg = "https://www.elitesingles.co.uk/wp-content/uploads/sites/59/2019/11/2b_en_articleslide_sm2-350x264.jpg";

        # Profile Details
        $contactnumber = "42";
        $department = "IT";
        $postnumber = "4";
        $clubnumber = "9";
        $coverimage = "https://natureconservancy-h.assetsadobe.com/is/image/content/dam/tnc/nature/en/photos/Zugpsitze_mountain.jpg?crop=0%2C176%2C3008%2C1654&wid=4000&hei=2200&scl=0.752";
        $clubs = array(
            array(
                'profileimage' => "http://static1.squarespace.com/static/600d59ef6c455e4aedfb6ad1/t/600d7050c7b0366806fc12de/1611493463143/logo-01.png?format=1500w",
                'clubname'=> "Emu Sports Club",
                'membernumber' => "264",
                'status' => "public"
            ),
            array(
                'profileimage' => "https://www.oceancitylibrary.org/sites/default/files/Images/book-club.jpg",
                'clubname'=> "Book Club",
                'membernumber' => "86",
                'status' => "public"
            ),
            array(
                'profileimage' => "https://thumbs.dreamstime.com/z/running-club-logo-template-vector-illustrator-flat-design-156698976.jpg",
                'clubname'=> "Running Club",
                'membernumber' => "543",
                'status' => "private"
            ),
            array(
                'profileimage' => "https://st.depositphotos.com/1605004/3293/v/950/depositphotos_32939581-stock-illustration-icon-or-logo-photography-club.jpg",
                'clubname'=> "Photography Club",
                'membernumber' => "5234",
                'status' => "public"
            )
        );
        $friends = array(
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

        $profile = ["contactnumber"=>$contactnumber,"department"=>$department,"postnumber"=>$postnumber,"clubnumber"=>$clubnumber,"coverimage"=>$coverimage,"clubs"=>$clubs,"friends"=>$friends];
        $user = ["fullname"=>$fullname,"firstname"=>$firstname,"lastname"=>$lastname,"profileimg"=>$profileimg,"username"=>$username];
       
        # Post Details
        function getpostcontent($user) {
            // $user = Auth::user();
            $posts = array(
                array(
                    'postername' => $user["fullname"],
                    'posterimage' => "https://www.elitesingles.co.uk/wp-content/uploads/sites/59/2019/11/2b_en_articleslide_sm2-350x264.jpg",
                    'postdesc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. agna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                    'posttime' => '04:23 AM',
                    'postlikes' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                    'postcomments' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                )
            );
            return $posts;
        }

        #From Club Post Details
        function getclubpostcontent($user) {
            // $user = Auth::user();
            $fromclubposts = array(
                array(
                    'clubprofileimg' => "http://static1.squarespace.com/static/600d59ef6c455e4aedfb6ad1/t/600d7050c7b0366806fc12de/1611493463143/logo-01.png?format=1500w",
                    'clubname'=> "Emu Sports Club",
                    'postername' => $user["fullname"],
                    'posterimage' => "https://www.elitesingles.co.uk/wp-content/uploads/sites/59/2019/11/2b_en_articleslide_sm2-350x264.jpg",
                    'postdesc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. agna aliqua. Ut enim ad minim veniam, 
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                    'posttime' => '04:23 AM',
                    'postlikes' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                    'postcomments' => array('user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3'),
                )
            );
            return $fromclubposts;
        }

        # Who is to connect part
        function connectfriends() {
            // $user = Auth::user();
            $connectfriends = array(
                array(
                    'profileimage' => "https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg",
                    'fullname'=> "Ahmet Atlayan",
                    'username' => "@ahmetatlayan"
                ),
                array(
                    'profileimage' => "https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg",
                    'fullname'=> "Fadime Ucangil",
                    'username' => "@fadimeucangil"
                ),
                array(
                    'profileimage' => "https://media.istockphoto.com/id/1338134336/photo/headshot-portrait-african-30s-man-smile-look-at-camera.jpg?b=1&s=170667a&w=0&k=20&c=j-oMdWCMLx5rIx-_W33o3q3aW9CiAWEvv9XrJQ3fTMU=",
                    'fullname'=> "Hasan Reponsiv",
                    'username' => "@hasanreponsiv"
                ),
                array(
                    'profileimage' => "https://digitalasset.intuit.com/content/dam/intuit/pcg/en_ca/profile/web/image/photos/grinning-man-with-coffee-image-profile-ca-desktop.jpg",
                    'fullname'=> "Peter Kacucam",
                    'username' => "@peterkacucam"
                ),
                array(
                    'profileimage' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnM--P4C62JpX6FJKWbGeGr11tZjjIOu-xXL1cCroW4rh4HSGhJYHXusQzpQ8gG0olYSk&usqp=CAU",
                    'fullname'=> "Yasemin Drabez",
                    'username' => "@yasemindrabez"
                )
            );
            return $connectfriends;
        }

        # Clubs for you part
        function connectclubs() {
            // $user = Auth::user();
            $connectclubs = array(
                array(
                    'profileimage' => "http://static1.squarespace.com/static/600d59ef6c455e4aedfb6ad1/t/600d7050c7b0366806fc12de/1611493463143/logo-01.png?format=1500w",
                    'clubname'=> "Emu Sports Club",
                    'membernumber' => "264",
                    'status' => "public"
                ),
                array(
                    'profileimage' => "https://www.oceancitylibrary.org/sites/default/files/Images/book-club.jpg",
                    'clubname'=> "Book Club",
                    'membernumber' => "86",
                    'status' => "public"
                ),
                array(
                    'profileimage' => "https://thumbs.dreamstime.com/z/running-club-logo-template-vector-illustrator-flat-design-156698976.jpg",
                    'clubname'=> "Running Club",
                    'membernumber' => "543",
                    'status' => "private"
                ),
                array(
                    'profileimage' => "https://st.depositphotos.com/1605004/3293/v/950/depositphotos_32939581-stock-illustration-icon-or-logo-photography-club.jpg",
                    'clubname'=> "Photography Club",
                    'membernumber' => "5234",
                    'status' => "public"
                ),
                array(
                    'profileimage' => "https://scontent.fecn6-1.fna.fbcdn.net/v/t1.6435-9/48369566_1946179102164755_8907960526378631168_n.png?_nc_cat=108&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=yCTt8H7xS_0AX9q5cqG&_nc_ht=scontent.fecn6-1.fna&oh=00_AfBLFopJPr97J1EnYpuKCVzAjL5r4Ub_OAh9TgjztfaIrQ&oe=63C3D200",
                    'clubname'=> "Camping Club",
                    'membernumber' => "866",
                    'status' => "private"
                ),
                array(
                    'profileimage' => "https://clydejudo.org.uk/wp-content/uploads/sites/668/2022/03/cropped-Clyde-Logo-halo.jpg",
                    'clubname'=> "Judo Club",
                    'membernumber' => "542",
                    'status' => "private"
                ),
                array(
                    'profileimage' => "https://fl01000126.schoolwires.net/cms/lib/FL01000126/Centricity/Domain/354/Screen%20Shot%202016-08-30%20at%2010.17.21%20PM.png",
                    'clubname'=> "Engineering Club",
                    'membernumber' => "321",
                    'status' => "public"
                ),
                array(
                    'profileimage' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7PIqtKbbV1TNkmJ5huGcqNtAA5Xu29e2iW4nJnIe12-4AbHSEeeUDygfoNeW9UgXKLd0&usqp=CAU",
                    'clubname'=> "Emu IT Club",
                    'membernumber' => "4643",
                    'status' => "private"
                ),
            );
            return $connectclubs;
        }

        return view('app/homepage', ["user"=>$user, "profile"=>$profile, "posts"=>getpostcontent($user), "fromclubposts"=>getclubpostcontent($user),"connectfriends"=>connectfriends(), "connectclubs"=>connectclubs()]);
    }
}