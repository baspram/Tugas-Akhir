<?php

use Illuminate\Database\Seeder;

class ObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $faker = Faker\Factory::create();

      // for($i=0; $i < 10; $i++){
      // 	$object = App\Object::create([
      // 		'name' => $faker->name,
      // 		'availability' => $faker->boolean,
      // 		'value_a' => $faker->numberBetween($min = 0, $max = 20),
      // 		'value_b' => $faker->numberBetween($min = 0, $max = 20),
      // 		'value_c' => $faker->numberBetween($min = 0, $max = 20),
      // 		'value_d' => $faker->numberBetween($min = 0, $max = 20),
      // 		'duration' => $faker->numberBetween($min = 60, $max = 6000),
      // 		'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
      // 		'description_updated_at' => Carbon\Carbon::now() 
      // 	]);
      // }
      // 
      
      $object = App\Object::create([
        'object_id' => 1,
        'name' => "Mad Max: Fury Road",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'MadMaxMarker.jpg',
        'marker_path' => 'uploads/MadMaxMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 1,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 1,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 1,
        'category_id' => 3,
        'values' => 15,
      ]);
      $description = App\Description::create([
        'object_id' => 1,
        'category_id' => NULL,
        'content' => "Mad Max: Fury Road is a 2015 action film directed and produced by George Miller, and written by Miller, Brendan McCarthy and Nico Lathouris. The fourth instalment in the Mad Max franchise, it is an Australian and American[6] venture produced by Kennedy Miller Mitchell, RatPac-Dune Entertainment and Village Roadshow Pictures. The film is set in a future desert wasteland where gasoline and water are scarce commodities. It follows Max Rockatansky (Tom Hardy), who joins forces with Imperator Furiosa (Charlize Theron) to flee from cult leader Immortan Joe (Hugh Keays-Byrne) and his army in an armoured tanker truck, which leads to a lengthy road battle. The film also features Nicholas Hoult, Rosie Huntington-Whiteley, Riley Keough, Zoë Kravitz, Abbey Lee, and Courtney Eaton. \nFury Road was in development hell for many years, with pre-production starting as early as 1997. Attempts were made to shoot the film in 2001 and 2003, but were delayed due to the September 11 attacks and the Iraq War. In 2007, after focusing on Happy Feet, Miller decided to pursue producing the film again. He briefly considered producing it as a computer-animated film but abandoned it in favor of live-action. In 2009, Miller announced that filming would begin in early 2011. Hardy was cast as Max in June 2010, with production planned to begin that November. Principal photography was delayed several more times before beginning in July 2012. The film wrapped in December 2012, although additional footage was shot in November 2013. \nThe film had its world premiere on 7 May 2015 at the TCL Chinese Theatre. It began a worldwide theatrical release on 14 May 2015, including an out-of-competition screening at the 68th Cannes Film Festival, in 2D, 3D, IMAX 3D and 4DX. It has grossed over $378 million worldwide, making it the highest-grossing film in the Mad Max franchise. The film was widely acclaimed for its acting, Miller's direction, screenplay, art direction, score, practical effects, stunts, action sequences, and visual storytelling, and is considered the best film of 2015 by many critics and publications as well as one of the greatest action films of all time. Fury Road won multiple critical and guild awards, and received ten Academy Award nominations including Best Picture and Best Director for George Miller. It won six: Best Costume Design, Best Production Design, Best Makeup and Hairstyling, Best Film Editing, Best Sound Editing, and Best Sound Mixing."
      ]);
      $photo = App\Photos::create([
        'object_id' => 1,
        'category_id' => NULL,
        'photo_name' => 'MadMaxDefault.jpeg',
        'photo_path' => 'uploads/MadMaxDefault.jpeg'
      ]);
      $video = App\Videos::create([
        'object_id' => 1,
        'category_id' => NULL,
        'video_name' => 'MadMaxDefault.mp4',
        'video_path' => 'uploads/MadMaxDefault.mp4'
      ]);




      $object = App\Object::create([
        'object_id' => 2,
        'name' => "The Notebook",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'NotebookMarker.jpg',
        'marker_path' => 'uploads/NotebookMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 2,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 2,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 2,
        'category_id' => 3,
        'values' => 15,
      ]);
      $description = App\Description::create([
        'object_id' => 2,
        'category_id' => NULL,
        'content' => "The Notebook is a 2004 American romantic drama film directed by Nick Cassavetes and based on the 1996 novel of the same name by Nicholas Sparks. The film stars Ryan Gosling and Rachel McAdams as a young couple who fall in love in the 1940s. Their story is narrated from the present day by an elderly man (portrayed by James Garner) telling the tale to a fellow nursing home resident (played by Gena Rowlands, who is Cassavetes' mother). \nThe Notebook received mixed reviews but performed well at the box office and received several award nominations, winning eight Teen Choice Awards, a Satellite Award and an MTV Movie Award. The film became a sleeper hit[3][4] and has gained a cult following.[5][6] On November 11, 2012, ABC Family premiered an extended version with deleted scenes added back into the original storyline.[7]"
      ]);
      $photo = App\Photos::create([
        'object_id' => 2,
        'category_id' => NULL,
        'photo_name' => 'NotebookDefault.jpg',
        'photo_path' => 'uploads/NotebookDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 2,
        'category_id' => NULL,
        'video_name' => 'NotebookDefault.mp4',
        'video_path' => 'uploads/NotebookDefault.mp4'
      ]); 


      $object = App\Object::create([
        'object_id' => 3,
        'name' => "(500) Days of Summer",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => '500DaysOfSummerMarker.jpg',
        'marker_path' => 'uploads/500DaysOfSummerMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 3,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 3,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 3,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 3,
        'category_id' => NULL,
        'content' => "500 Days of Summer (stylized as (500) Days of Summer) is a 2009 American romantic comedy-drama film directed by Marc Webb from a screenplay written by Scott Neustadter and Michael H. Weber, and produced by Mark Waters. The film stars Joseph Gordon-Levitt and Zooey Deschanel, and employs a nonlinear narrative structure, with the story based upon its male protagonist and his memories of a failed relationship.[3] \nAs an independent production, the film was picked up for distribution by Fox Searchlight Pictures and premiered at the 25th Sundance Film Festival. It garnered critical acclaim and became a successful sleeper hit, earning over $60 million in worldwide returns, far exceeding its $7.5 million budget. Many critics lauded the film as one of the best from 2009 and drew comparisons to other acclaimed films such as Annie Hall (1977) and High Fidelity (2000).[3][4][5] \nThe film received Best Original Screenplay and Best Screenplay awards at the 14th Satellite Awards and 25th Independent Spirit Awards, respectively, as well as two nominations at the 67th Golden Globe Awards: Best Motion Picture – Musical or Comedy and Best Actor – Musical or Comedy (Gordon-Levitt)."
      ]);
      $photo = App\Photos::create([
        'object_id' => 3,
        'category_id' => NULL,
        'photo_name' => '500DaysOfSummerDefault.jpg',
        'photo_path' => 'uploads/500DaysOfSummerDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 3,
        'category_id' => NULL,
        'video_name' => '500DaysOfSummerDefault.mp4',
        'video_path' => 'uploads/500DaysOfSummerDefault.mp4'
      ]); 






      $object = App\Object::create([
        'object_id' => 4,
        'name' => "Jason Bourne",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'JasonBourneMarker.jpg',
        'marker_path' => 'uploads/JasonBourneMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 4,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 4,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 4,
        'category_id' => 3,
        'values' => 15,
      ]);
      $description = App\Description::create([
        'object_id' => 4,
        'category_id' => NULL,
        'content' => "Jason Bourne is a 2016 American action film directed by Paul Greengrass and written by Greengrass and film editor Christopher Rouse. The fifth installment of the Bourne film series and the direct sequel to 2007's The Bourne Ultimatum, Matt Damon reprises his role as the main character, former CIA assassin and psychogenic amnesiac Jason Bourne.\nIn the film, Bourne remains on the run from CIA hit squads as he tries to uncover hidden truths about his father. When former CIA operative Nicky Parsons (Julia Stiles) hacks into the agency database to uncover evidence about its illegal black ops programs, she discovers new information about Bourne's recruitment that alters his understanding of the past. After Parsons' breach, CIA Director Robert Dewey (Tommy Lee Jones) orders CIA cyber head Heather Lee (Alicia Vikander) to hunt down the pair. Vincent Cassel and Riz Ahmed also star. \nPrincipal photography on the film commenced on September 8, 2015. The film premiered in London on July 11, 2016, and was theatrically released in the United States on July 29, 2016, by Universal Pictures. It has received mixed reviews and has grossed over $347 million worldwide.[2]"
      ]);
      $photo = App\Photos::create([
        'object_id' => 4,
        'category_id' => NULL,
        'photo_name' => 'JasonBourneDefault.jpg',
        'photo_path' => 'uploads/JasonBourneDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 4,
        'category_id' => NULL,
        'video_name' => 'JasonBourneDefault.mp4',
        'video_path' => 'uploads/JasonBourneDefault.mp4'
      ]);



     
      $object = App\Object::create([
        'object_id' => 5,
        'name' => "TED",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'TedMarker.jpg',
        'marker_path' => 'uploads/TedMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 5,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 5,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 5,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 5,
        'category_id' => NULL,
        'content' => "Ted is a 2012 American comedy film directed by Seth MacFarlane in his feature film directorial debut. The screenplay by MacFarlane, Alec Sulkin, and Wellesley Wild is from MacFarlane's story. The film stars MacFarlane, Mark Wahlberg, Mila Kunis, and with Joel McHale and Giovanni Ribisi in supporting roles, with MacFarlane providing the voice of the title character. The film tells the story of John Bennett, a Boston native whose childhood wish brings his teddy bear friend Ted to life. However, Ted prevents John and his love interest Lori Collins from moving on with their lives. \nThe film is MacFarlane's feature-length directorial debut,[3] produced by Media Rights Capital and distributed by Universal Pictures. It was the twelfth-highest-grossing film of 2012 and received an Academy Award nomination for Best Original Song. \nA sequel, Ted 2, was released on June 26, 2015"
      ]);
      $photo = App\Photos::create([
        'object_id' => 5,
        'category_id' => NULL,
        'photo_name' => 'TedDefault.jpg',
        'photo_path' => 'uploads/TedDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 5,
        'category_id' => NULL,
        'video_name' => 'TedDefault.mp4',
        'video_path' => 'uploads/TedDefault.mp4'
      ]); 

      $object = App\Object::create([
        'object_id' => 6,
        'name' => "Titanic",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'TitanicMarker.jpg',
        'marker_path' => 'uploads/TitanicMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 6,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 6,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 6,
        'category_id' => 3,
        'values' => 15,
      ]);
      $description = App\Description::create([
        'object_id' => 6,
        'category_id' => NULL,
        'content' => "Titanic is a 1997 American epic romance-disaster film directed, written, co-produced, and co-edited by James Cameron. A fictionalized account of the sinking of the RMS Titanic, it stars Leonardo DiCaprio and Kate Winslet as members of different social classes who fall in love aboard the ship during its ill-fated maiden voyage. \nCameron's inspiration for the film came from his fascination with shipwrecks; he felt a love story interspersed with the human loss would be essential to convey the emotional impact of the disaster. Production began in 1995, when Cameron shot footage of the actual Titanic wreck. The modern scenes on the research vessel were shot on board the Akademik Mstislav Keldysh, which Cameron had used as a base when filming the wreck. Scale models, computer-generated imagery, and a reconstruction of the Titanic built at Playas de Rosarito in Baja California were used to re-create the sinking. The film was partially funded by Paramount Pictures and 20th Century Fox. It was the most expensive film made at that time, with an estimated budget of $200 million. \nUpon its release on December 19, 1997, Titanic achieved critical and commercial success. Nominated for fourteen Academy Awards, it tied All About Eve (1950) for the most Oscar nominations, and won eleven, including the awards for Best Picture and Best Director, tying Ben Hur (1959) for the most Oscars won by a single film. With an initial worldwide gross of over $1.84 billion, Titanic was the first film to reach the billion-dollar mark. It remained the highest-grossing film of all time until Cameron's 2009 film Avatar surpassed it in 2010. A 3D version of Titanic, released on April 4, 2012 to commemorate the centennial of the sinking, earned it an additional $343.6 million worldwide, pushing the film's worldwide total to $2.18 billion. It became the second film to gross more than $2 billion worldwide (after Avatar)."
      ]);
      $photo = App\Photos::create([
        'object_id' => 6,
        'category_id' => NULL,
        'photo_name' => 'TitanicDefault.jpg',
        'photo_path' => 'uploads/TitanicDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 6,
        'category_id' => NULL,
        'video_name' => 'TitanicDefault.mp4',
        'video_path' => 'uploads/TitanicDefault.mp4'
      ]); 




      $object = App\Object::create([
        'object_id' => 7,
        'name' => "Killers",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'KillersMarker.jpg',
        'marker_path' => 'uploads/KillersMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 7,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 7,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 7,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 7,
        'category_id' => NULL,
        'content' => "Killers is a 2010 American romantic comedy action film starring Katherine Heigl, Ashton Kutcher, Tom Selleck and Catherine O'Hara. The film was released in the United States and Canada on June 4, 2010. The film centers on a young woman (Heigl) who meets a man (Kutcher) who turns out to be an assassin. \nAfter a break-up with a boyfriend, an overcautious Jen (Katherine Heigl) travels to Nice, France, with her parents (Tom Selleck and Catherine O'Hara). After getting into an elevator to go to her hotel room, she meets Spencer Aimes (Ashton Kutcher). Spencer asks her out for drinks, and she accepts. The scene then changes to Spencer sneaking onto a boat, putting a remote controlled bomb on the bottom of a helicopter, then taking out a guard. He then swims back and goes on the date with Jen. After the helicopter takes off, Spencer triggers the bomb using his phone."
      ]);
      $photo = App\Photos::create([
        'object_id' => 7,
        'category_id' => NULL,
        'photo_name' => 'KillersDefault.jpg',
        'photo_path' => 'uploads/KillersDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 7,
        'category_id' => NULL,
        'video_name' => 'KillersDefault.mp4',
        'video_path' => 'uploads/KillersDefault.mp4'
      ]); 







      $object = App\Object::create([
        'object_id' => 8,
        'name' => "3 idiots",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => '3IdiotsMarker.jpg',
        'marker_path' => 'uploads/3IdiotsMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 8,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 8,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 8,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 8,
        'category_id' => NULL,
        'content' => "3 Idiots is a 2009 Indian coming of age comedy-drama film co-written, edited, and directed by Rajkumar Hirani and produced by Vidhu Vinod Chopra. Abhijat Joshi wrote the screenplay. It was loosely adapted from the novel Five Point Someone by Chetan Bhagat. The film stars Aamir Khan, Kareena Kapoor, R. Madhavan, Sharman Joshi, Omi Vaidya, Parikshit Sahni and Boman Irani. \nUpon release, the film was the highest-grossing film in its opening weekend in India and had the highest opening day collections for an Indian film up until that point. It also held the record for the highest net collections in the first week for a Bollywood film. It also became one of the few Indian films to become successful in East Asian markets such as China,[4] eventually bringing its overseas total to more than US$65 million at the time—the highest-grossing Bollywood film of all time in overseas markets, before being overtaken by Chennai Express in 2013. \nThe film is distinctive for featuring real inventions by little-known people in India's backyards. The brains behind the innovations were Remya Jose, a student from Kerala, who created the exercise-bicycle/washing-machine; Mohammad Idris, a barber from Meerut district in Uttar Pradesh, who invented a bicycle-powered horse clipper; and Jahangir Painter, a painter from Maharashtra, who made the scooter-powered flour mill.[5] This film was remade in Tamil as Nanban (2012) which also received critical praise and commercial success.[6][7] It has also been announced that there will be a Chinese remake of the film produced by Stephen Chow and that there are plans for a Hollywood remake produced in the United States.[8] A Telugu remake was planned despite Nanban having a Telugu dubbed version titled Snehitudu."
      ]);
      $photo = App\Photos::create([
        'object_id' => 8,
        'category_id' => NULL,
        'photo_name' => '3IdiotsDefault.jpg',
        'photo_path' => 'uploads/3IdiotsDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 8,
        'category_id' => NULL,
        'video_name' => '3IdiotsDefault.mp4',
        'video_path' => 'uploads/3IdiotsDefault.mp4'
      ]); 



     


      $object = App\Object::create([
        'object_id' => 9,
        'name' => "Anchorman",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'AnchormanMarker.jpg',
        'marker_path' => 'uploads/AnchormanMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 9,
        'category_id' => 1,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 9,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 9,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 9,
        'category_id' => NULL,
        'content' => "Anchorman: The Legend of Ron Burgundy is a 2004 American comedy film directed by Adam McKay, produced by Judd Apatow, starring Will Ferrell, and written by McKay and Ferrell. The film is a tongue-in-cheek take on the culture of the 1970s, particularly the new Action News format.[3] It portrays a San Diego TV station where Ferrell's title character clashes with his new female counterpart. This film is number 100 on Bravo's 100 funniest movies, number 6 on TimeOut's top 100 comedy films of all time and 113 on Empire's 500 Greatest Movies of All Time. \nThe film made $28.4 million in its opening weekend, and $90.6 million worldwide in its total theatrical run. A companion film assembled from outtakes and abandoned subplots, titled Wake Up, Ron Burgundy: The Lost Movie, was released straight-to-DVD in late 2004. A sequel, Anchorman 2: The Legend Continues, was released on December 18, 2013, with Paramount Pictures replacing DreamWorks for distribution.[4][5][6]"
      ]);
      $photo = App\Photos::create([
        'object_id' => 9,
        'category_id' => NULL,
        'photo_name' => 'AnchormanDefault.jpg',
        'photo_path' => 'uploads/AnchormanDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 9,
        'category_id' => NULL,
        'video_name' => 'AnchormanDefault.mp4',
        'video_path' => 'uploads/AnchormanDefault.mp4'
      ]); 


      $object = App\Object::create([
        'object_id' => 10,
        'name' => "Snatch",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'SnatchMarker.jpg',
        'marker_path' => 'uploads/SnatchMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 10,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 10,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 10,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 10,
        'category_id' => NULL,
        'content' => "Snatch (stylised as snatch.) is a 2000 British crime comedy film written and directed by Guy Ritchie, featuring an ensemble cast. Set in the London criminal underworld, the film contains two intertwined plots: one dealing with the search for a stolen diamond, the other with a small-time boxing promoter (Jason Statham) who finds himself under the thumb of a ruthless gangster (Alan Ford) who is ready and willing to have his subordinates carry out severe and sadistic acts of violence. \nThe film features an assortment of characters, including Irish Traveller Mickey O'Neil (Brad Pitt), referred to as a pikey, arms-dealer Boris the Blade Yurinov (Rade Šerbedžija), professional thief and gambling addict Franky Four-Fingers (Benicio del Toro), American gangster-jeweller Abraham Denovitz known as Cousin Avi (Dennis Farina), and bounty hunter Bullet-Tooth Tony (Vinnie Jones). It is also distinguished by a kinetic direction and editing style, a circular plot featuring numerous ironic twists of chance and causality, and a fast pace. \nThe film shares themes, ideas and motifs with Ritchie's first film, Lock, Stock and Two Smoking Barrels. It is also filmed in the same visual style and features many of the same actors, including Jones, Statham, and Ford."
      ]);
      $photo = App\Photos::create([
        'object_id' => 10,
        'category_id' => NULL,
        'photo_name' => 'SnatchDefault.jpg',
        'photo_path' => 'uploads/SnatchDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 10,
        'category_id' => NULL,
        'video_name' => 'SnatchDefault.mp4',
        'video_path' => 'uploads/SnatchDefault.mp4'
      ]);



      $object = App\Object::create([
        'object_id' => 11,
        'name' => "Hot Fuzz",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'HotFuzzMarker.jpg',
        'marker_path' => 'uploads/HotFuzzMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 11,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 11,
        'category_id' => 2,
        'values' => 15,
      ]);
      $value = App\Values::create([
        'object_id' => 11,
        'category_id' => 3,
        'values' => 20,
      ]);
      $description = App\Description::create([
        'object_id' => 11,
        'category_id' => NULL,
        'content' => "Hot Fuzz is a 2007 British satirical action comedy film directed by Edgar Wright, written by Wright and Simon Pegg, and starring Pegg and Nick Frost. The three and the film's producer Nira Park had previously worked together on the television series Spaced and the 2004 film Shaun of the Dead.[5] The film follows two police officers attempting to solve a series of mysterious deaths in Sandford, a fictional small English village. \nOver a hundred action films were used as inspiration for developing the script. Filming took place over eleven weeks in early 2006, and featured an extensive cast along with various uncredited cameos. Visual effects were developed by ten artists to expand on or add explosions, gore, and gunfire scenes.\nDebuting on 14 February 2007 in the United Kingdom and 20 April in the United States, Hot Fuzz received critical and commercial success. Shortly after the film's release, two different soundtracks were released in the UK and US. \nThe film is the second in Wright and Pegg's Three Flavours Cornetto trilogy and was preceded by 2004's Shaun of the Dead and followed by 2013's The World's End, each of them featuring a different flavour of Cornetto ice cream.[6] It is also the most financially successful film in the trilogy."
      ]);
      $photo = App\Photos::create([
        'object_id' => 11,
        'category_id' => NULL,
        'photo_name' => 'HotFuzzDefault.jpg',
        'photo_path' => 'uploads/HotFuzzDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 11,
        'category_id' => NULL,
        'video_name' => 'HotFuzzDefault.mp4',
        'video_path' => 'uploads/HotFuzzDefault.mp4'
      ]); 




      $object = App\Object::create([
        'object_id' => 12,
        'name' => "Inception",
        'duration' => 10,
        'availability' => 1,
        'marker_name' => 'InceptionMarker.jpg',
        'marker_path' => 'uploads/InceptionMarker.jpg'
      ]);
      $value = App\Values::create([
        'object_id' => 12,
        'category_id' => 1,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 12,
        'category_id' => 2,
        'values' => 20,
      ]);
      $value = App\Values::create([
        'object_id' => 12,
        'category_id' => 3,
        'values' => 15,
      ]);
      $description = App\Description::create([
        'object_id' => 12,
        'category_id' => NULL,
        'content' => "Inception is a 2010 science fiction heist thriller film written, co-produced, and directed by Christopher Nolan, and co-produced by Emma Thomas. The film stars Leonardo DiCaprio as a professional thief who steals information by infiltrating the subconscious, and is offered a chance to have his criminal history erased as payment for a task seemingly-impossible: inception, the implantation of another person's idea into a target's subconscious.[4] The ensemble cast additionally includes Ellen Page, Joseph Gordon-Levitt, Marion Cotillard, Ken Watanabe, Tom Hardy, Dileep Rao, Cillian Murphy, Tom Berenger, and Michael Caine. \nAfter the 2002 completion of Insomnia, Nolan presented to Warner Bros. a written 80-page treatment about a horror film envisioning dream stealers based on lucid dreaming.[5] Emphasizing on professional-scale experience, Nolan retired the project and instead worked on 2005's Batman Begins, 2006's The Prestige, and The Dark Knight in 2008.[6] The treatment was revised over 6 months and was purchased by Warner in February 2009.[7] Inception was filmed in six countries, beginning in Tokyo in June 19 and ending in Canada in November 22.[8] Its official budget was US$160 million, split between Warner Bros and Legendary.[9] Nolan's reputation and success with The Dark Knight helped secure the film's $100 million in advertising expenditure. \nInception's première was held in London on July 8, 2010; its wide release to both conventional and IMAX theaters began on July 16, 2010.[10][11] A box office success, Inception has grossed over $800 million worldwide.[3] The home video market also had strong results, with $68 million in DVD and Blu-ray sales. Inception opened to acclaim from critics, who praised its story, score, and ensemble cast.[12] It won four Academy Awards for Best Cinematography, Best Sound Editing, Best Sound Mixing, and Best Visual Effects, and was nominated for four more: Best Picture, Best Original Score, Best Art Direction, and Best Original Screenplay."
      ]);
      $photo = App\Photos::create([
        'object_id' => 12,
        'category_id' => NULL,
        'photo_name' => 'InceptionDefault.jpg',
        'photo_path' => 'uploads/InceptionDefault.jpg'
      ]);
      $video = App\Videos::create([
        'object_id' => 12,
        'category_id' => NULL,
        'video_name' => 'InceptionDefault.mp4',
        'video_path' => 'uploads/InceptionDefault.mp4'
      ]); 





    //   for ($i=2; $i < 24; $i++){
    //     $id = "" . $i;
    //     $nama = "Objek " . $faker->name;
    //     $availability = $faker->numberBetween($min = 0, $max = 1);
    //     if(($i%4) == 1){
    //       $marker = 'pinball.png';
    //       $path = 'uploads/pinball.png';
    //     }
    //     if(($i%4) == 2){
    //       $marker = 'starry_night.png';
    //       $path = 'uploads/starry_night.png';
    //     }
    //     if(($i%4) == 3){
    //       $marker = 'boba_fett.jpg';
    //       $path = 'uploads/boba_fett.jpg';
    //     }
    //     if(($i%4) == 0){
    //       $marker = 'hiro.png';
    //       $path = 'uploads/hiro.png';
    //     }
    //     $object = App\Object::create([
    //       'object_id' => $id,
    //       'name' => $nama,
    //       'duration' => 100,
    //       'availability' => $availability,
    //       'marker_name' => $marker,
    //       'marker_path' => $path
    //     ]);
    //   }
      
    //   for ($i=2; $i < 24; $i++){
    //     for ($j=1; $j < 5; $j++){
    //       $value = App\Values::create([
    //         'object_id' => $i,
    //         'category_id' => $j,
    //         'values' => $faker->numberBetween($min = 0, $max = 50),
    //       ]);
    //     }
    //   }

    //   for ($i=2; $i < 24; $i++){
    //     for ($j=1; $j < 5; $j++){
    //       $description = App\Description::create([
    //         'object_id' => $i,
    //         'category_id' => NULL,
    //         'content' => $faker->text($maxNbChars = 200)
    //       ]);
    //       if($faker->boolean){
    //         $description = App\Description::create([
    //           'object_id' => $i,
    //           'category_id' => $j,
    //           'content' => $faker->text($maxNbChars = 200)
    //         ]);
    //       }
    //     }
    //   }
      
    //   for ($i=2; $i < 24; $i++){
    //     if($faker->boolean){
    //       $phoname = "Untitled-" . $i . ".png";
    //       $phopath = "uploads\Untitled-" . $i . ".png";
    //       $photo = App\Photos::create([
    //         'object_id' => $i,
    //         'category_id' => NULL,
    //         'photo_name' => $phoname,
    //         'photo_path' => $phopath
    //       ]);
    //     }
    //     if(($i%4) == 1){
    //       $marker = 'video-1.mp4';
    //     }
    //     if(($i%4) == 2){
    //       $marker = 'video-2.mp4';
    //     }
    //     if(($i%4) == 3){
    //       $marker = 'video-3.mp4';
    //     }
    //     if(($i%4) == 0){
    //       $marker = 'video-4.mp4';
    //     }
    //     $path = "uploads/" + $marker;
    //     if($faker->boolean){
    //       $video = App\Videos::create([
    //         'object_id' => $i,
    //         'category_id' => NULL,
    //         'video_name' => $marker,
    //         'video_path' => $path
    //       ]);
    //     }
    //   }      
    }
}
