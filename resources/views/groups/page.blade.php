@extends('layouts.master', ['body' => $isEdit ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'submenuId' => 'groups', 'headline' => false])

@section('title', 'Group Home: ' . $group->name)

@section('content')
<div id="mypage-wrapper">
	<div id="mypage-left-panel">
		<div id="mypage-top-nav"></div>
    <div id="header-bar-outer">
	<div id="header-bar" class="box dark-blue">
		<div class="box-header"><div></div></div>
		<div class="box-body">
			<div class="box-content clearfix">
			<span id="header-bar-text">
				Group Home: Happy
			</span>

				<a href="/web/20071017031959/http://www.habbo.com/community/mgm_sendlink_invite.html?sendLink=/groups/1007/id" id="tell-button" class="toolbutton tell"><span>Tell a friend</span></a>


				<a href="/web/20071017031959/http://www.habbo.com/groups" class="toolbutton" id="creategrp-button"><span>Create your own Group</span></a>
				<a href="https://web.archive.org/web/20071017031959/https://www.habbo.com/groups/actions/joinAfterLogin?groupId=1007" class="toolbutton" id="join-button"><span>Log in to join this Group</span></a>
			</div>
		</div>
	</div>
	</div>

<div id="grouptabs">
  <ul>
    	<li id="selected"><a href="{{ url('/') }}/groups/{{ $group->id }}/id">Front Page</a></li>
    	<li>
    		<a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions">Discussion Forum</a></li>

  </ul>
</div>

			<br clear="all">

		<div id="mypage-top-spacer"></div>

			<div id="mypage-bg" class="b_hc_bg_pillow">
				<div id="playground">



<div class="movable widget GroupInfoWidget" id="widget-905973" style=" left: 328px; top: 8px; z-index: 2;">
<div class="w_skin_defaultskin">
	<div class="widget-corner" id="widget-905973-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">Group info</span><span class="header-right">&nbsp;</span></h3>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-content">

<div class="group-info-icon"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/badge/b0701Xs08091s18053s18054s05066808cc44b07a56b4d9fcdb2423fad672c.gif"></div>
<h4>Happy</h4>

<p>Group created: <b>May 30, 2007</b></p>

<div class="group-info-description">If you are Happy when you are on Habbo Hotel here is a group for you!!!  Group, dedicated to my lovely friends on Habbo.    Love Youuuuuuuuu :)    :D-)-&lt;  ahhh I love SIMPSONS :D</div>



<div id="profile-tags-panel">
<div id="profile-tag-list">
<div id="profile-tags-container">
No tags.
</div>

</div>

</div>
<script type="text/javascript">
    Event.onDOMReady(function() {
        new GroupInfoWidget('1007');
    });
</script>




		<div class="clear"></div>
		</div>
	</div>
</div>
</div>


<div class="movable widget GuestbookWidget" id="widget-906024" style=" left: 17px; top: 6px; z-index: 1;">
<div class="w_skin_defaultskin">
	<div class="widget-corner" id="widget-906024-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">My Guestbook(<span id="guestbook-size">53</span>) <span id="guestbook-type" class="public"><img src="/web/20071017031959im_/http://www.habbo.com/images/groups/status_exclusive.gif" title="Members only" alt="Members only"></span></span><span class="header-right">&nbsp;</span></h3>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-content">
<div id="guestbook-wrapper" class="gb-public">
<ul class="guestbook-entries" id="guestbook-entry-container">
	<li id="guestbook-entry-2020897" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1600218021255082801529007114400a6ef87eb8b1857e30335660e97c2959e.gif" alt="chillbill5" title="chillbill5">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/chillbill5">chillbill5</a>
			</div>
			<p><span style="color: rgb(216, 0, 0); --darkreader-inline-color: var(--darkreader-text-d80000, #ff3535);" data-darkreader-inline-color=""></span>ok this is gay im glad im apart of rage against our machines instead of this!</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Sep 23, 2007 8:40:43 PM</div>
	</li>
	<li id="guestbook-entry-1960195" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1150419009215012851529509114400e5ea3d44bd85a7526007513d07683d6f.gif" alt="QBP" title="QBP">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/QBP">QBP</a>
			</div>
			<p></p><div class="bbcode-quote">Love <span style="color: rgb(0, 198, 196); --darkreader-inline-color: var(--darkreader-text-00c6c4, #41fffd);" data-darkreader-inline-color="">animals</span>? Against <span style="color: rgb(216, 0, 0); --darkreader-inline-color: var(--darkreader-text-d80000, #ff3535);" data-darkreader-inline-color="">abuse</span>?<br><br>Then join <a href="/web/20071017031959/http://www.habbo.com/groups/24510/id">HETA: Stopping Animal Cruelty!</a><br><br>This group is the only <b>PETA</b> based group on Habbo! We have freed over <span style="color: rgb(130, 130, 130); --darkreader-inline-color: var(--darkreader-text-828282, #999083);" data-darkreader-inline-color="">100 </span>minds from the cruelty! <span style="color: rgb(108, 200, 0); --darkreader-inline-color: var(--darkreader-text-6cc800, #a7ff40);" data-darkreader-inline-color="">Visit</span> us today!<span style="color: rgb(255, 206, 0); --darkreader-inline-color: var(--darkreader-text-ffce00, #ffd31a);" data-darkreader-inline-color="">                          </span></div><p></p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Sep 8, 2007 10:55:06 PM</div>
	</li>
	<li id="guestbook-entry-1758897" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8540360001824017150573006114400d131a87b220c92e5856378990751d80f.gif" alt="bebe-linduxa" title="bebe-linduxa">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/bebe-linduxa">bebe-linduxa</a>
			</div>
			<p>im now of tht group </p><pre>happy </pre><p></p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 23, 2007 9:29:37 PM</div>
	</li>
	<li id="guestbook-entry-1758864" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8540360001824017150573006114400d131a87b220c92e5856378990751d80f.gif" alt="bebe-linduxa" title="bebe-linduxa">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/bebe-linduxa">bebe-linduxa</a>
			</div>
			<p></p><div class="bbcode-quote">i got the 50th messeges do u get something???????<br>rolmao i was jk :D<br>im<br>HAPPY</div><p></p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 23, 2007 9:27:11 PM</div>
	</li>
	<li id="guestbook-entry-1758840" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8540360001824017150573006114400d131a87b220c92e5856378990751d80f.gif" alt="bebe-linduxa" title="bebe-linduxa">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/bebe-linduxa">bebe-linduxa</a>
			</div>
			<p></p><div class="bbcode-quote"><span style="font-size: 14px;"><u><b>ILOVE THE SIMPSON TOO</b></u></span></div><p></p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 23, 2007 9:25:51 PM</div>
	</li>
	<li id="guestbook-entry-1758812" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8540360001824017150573006114400d131a87b220c92e5856378990751d80f.gif" alt="bebe-linduxa" title="bebe-linduxa">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/bebe-linduxa">bebe-linduxa</a>
			</div>
			<p><span style="font-size: 14px;">ALL BODY LOVE U HAPPY</span></p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 23, 2007 9:24:04 PM</div>
	</li>
	<li id="guestbook-entry-1745560" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1650818001215252850130501114400c6e275bf13d0a6af95dfacff7cedb10a.gif" alt="johnnysback13" title="johnnysback13">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/johnnysback13">johnnysback13</a>
			</div>
			<p>this group rocks!!!!!</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 22, 2007 9:57:28 PM</div>
	</li>
	<li id="guestbook-entry-1589416" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1450519001215252851529509114400f8f11905dc6083d5e8e0849061d189b7.gif" alt="Pedro-D-F" title="Pedro-D-F">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/Pedro-D-F">Pedro-D-F</a>
			</div>
			<p><b></b> <span style="color: rgb(0, 112, 215); --darkreader-inline-color: var(--darkreader-text-0070d7, #4bb0ff);" data-darkreader-inline-color=""></span>Brasil!<span style="color: rgb(108, 200, 0); --darkreader-inline-color: var(--darkreader-text-6cc800, #a7ff40);" data-darkreader-inline-color=""></span>Brasil!<br><br>Add --&gt;<a href=""></a> Pedro-D-F</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Aug 13, 2007 6:08:56 PM</div>
	</li>
	<li id="guestbook-entry-1219703" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/5450860009685017150373010114400972d74a4e0ec3fb52afe4091f91b9dfb.gif" alt="Coolrihanna22" title="Coolrihanna22">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/Coolrihanna22">Coolrihanna22</a>
			</div>
			<p>ur my fave group</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 19, 2007 11:02:33 PM</div>
	</li>
	<li id="guestbook-entry-1192093" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/12501190082551428001295011144003a8bd35cd26b3eb4a0a2e49f78db0a10.gif" alt="Darth-Falco" title="Darth-Falco">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/Darth-Falco">Darth-Falco</a>
			</div>
			<p>I'M SO HAPPY PPL :D :) &gt;:D &gt;:) :] &gt;:] =] =) =D &gt;=] &gt;=D</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 17, 2007 11:45:33 PM</div>
	</li>
	<li id="guestbook-entry-1152504" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/545016000968507695207300911440030172525a431043ebc810bcb46a952b7.gif" alt=":!:Mattie:!:" title=":!:Mattie:!:">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/%3A%21%3AMattie%3A%21%3A">:!:Mattie:!:</a>
			</div>
			<p>IM HAPPY :) :) :) :) :)</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 15, 2007 1:58:28 AM</div>
	</li>
	<li id="guestbook-entry-1033246" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/802471850721503275012951011440029b07b350b3b294ca01a56d7ecf7cdc2.gif" alt="MagicCerealBox" title="MagicCerealBox">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/MagicCerealBox">MagicCerealBox</a>
			</div>
			<p>Im very happy to be happy XD</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 4, 2007 11:30:17 PM</div>
	</li>
	<li id="guestbook-entry-1028354" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1500719001255042851130005114400385b533bb0d4d52acda063e1f76051fa.gif" alt="DonutDriftking" title="DonutDriftking">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/DonutDriftking">DonutDriftking</a>
			</div>
			<p>Them there wants to play a Habbo Retro hotel make me as a friend :)</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 4, 2007 4:03:19 PM</div>
	</li>
	<li id="guestbook-entry-993293" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8310918003225202851130006114400a9bf9fe1d754b85233eba2092e83f6fb.gif" alt="midozain" title="midozain">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/midozain">midozain</a>
			</div>
			<p>Yo</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jul 1, 2007 2:58:38 PM</div>
	</li>
	<li id="guestbook-entry-903492" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/5451160010660147150273503114400a32c507f37ffaec073b9132bcb8dc0a4.gif" alt="TeQuieroBaby,--" title="TeQuieroBaby,--">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/TeQuieroBaby%2C--">TeQuieroBaby,--</a>
			</div>
			<p>CAN I GET THIS BAG I WANNA JOIN= ]</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 22, 2007 5:54:53 PM</div>
	</li>
	<li id="guestbook-entry-891774" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/83616605096602170033730061144002e856b53878a9e5868524f84139ad530.gif" alt="PrettyAK47" title="PrettyAK47">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/PrettyAK47">PrettyAK47</a>
			</div>
			<p>its me again please come by &amp; search jazmeane thx</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 21, 2007 10:50:26 AM</div>
	</li>
	<li id="guestbook-entry-891773" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/83616605096602170033730061144002e856b53878a9e5868524f84139ad530.gif" alt="PrettyAK47" title="PrettyAK47">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/PrettyAK47">PrettyAK47</a>
			</div>
			<p>hi i work at the hot and yourr not i heard u won nice outfit pluse u have to change it to white &amp; blace srry toddles</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 21, 2007 10:49:54 AM</div>
	</li>
	<li id="guestbook-entry-871120" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/5451160010635127002572503114400c7318440352ec16b7d4c227c98d819e7.gif" alt="DopeLe." title="DopeLe.">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/DopeLe.">DopeLe.</a>
			</div>
			<p>J0iNin`. thisz joint.</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 18, 2007 9:32:16 PM</div>
	</li>
	<li id="guestbook-entry-835309" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/30501255211801028017100011144002e0d352356f8fa98207a8062a6ff8876.gif" alt="D4y" title="D4y">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/D4y">D4y</a>
			</div>
			<p>i love it sooo much</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 13, 2007 5:47:27 PM</div>
	</li>
	<li id="guestbook-entry-821779" class="guestbook-entry">
		<div class="guestbook-author">
			<img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/545116000966011715037301011440092924c943640dd476fa7c06d8b48617f.gif" alt="Flynn.Ryan" title="Flynn.Ryan">
		</div>
			<div class="guestbook-actions">
			</div>
		<div class="guestbook-message">
			<div class="offline">
				<a href="/web/20071017031959/http://www.habbo.com/home/Flynn.Ryan">Flynn.Ryan</a>
			</div>
			<p>I ♥ This Group</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
		<div class="guestbook-entry-footer metadata">Jun 11, 2007 10:08:29 PM</div>
	</li>
</ul></div>


<script type="text/javascript">
	Event.onDOMReady(function() {
		var gb906024 = new GuestbookWidget('231523', '906024', 500);
		gb906024.monitorScrollPosition();
		var editMenuSection = $('guestbook-privacy-options');
		if (editMenuSection) {
			gb906024.updateOptionsList('public');
		}
	});
</script>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>



<div class="movable widget MemberWidget" id="widget-905974" style=" left: 577px; top: 6px; z-index: 3;">
<div class="w_skin_defaultskin">
	<div class="widget-corner" id="widget-905974-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">Members of the group (<span id="avatar-list-size">259</span>)</span><span class="header-right">&nbsp;</span></h3>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-content">

<div id="avatar-list-search">
<input type="text" style="float:left;" id="avatarlist-search-string">
<a class="colorlink orange" style="float:left;" id="avatarlist-search-button"><span>Search</span></a>
</div>
<br clear="all">

<div id="avatarlist-content">

<div class="avatar-widget-list-container">
<ul id="avatar-list-list" class="avatar-widget-list">
	<li id="avatar-list-905974-10436" title="HAPPY"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-10436" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8560360003635147150173010114400b9793fdc905d87ae99216aeb7c58b734.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/HAPPY">HAPPY</a></h4>
<p class="avatar-list-birthday">Sep 1, 2004</p>
<p>
<img src="https://web.archive.org/web/20071017031959im_/http://images.habbohotel.com/habboweb/17/13/web-gallery/images/groups/owner_icon.gif" alt="" class="avatar-list-groupstatus">
</p></li>
	<li id="avatar-list-905974-13044053" title="magical-james2"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13044053" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8440618510215032810829009114400f063bafca6354fe9439d29634bd526aa.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/magical-james2">magical-james2</a></h4>
<p class="avatar-list-birthday">Mar 3, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-13627904" title="Msbobbylashley"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13627904" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/5450960009660076960173010114400d3d76fa654af3d753cda7e49c91624c3.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/Msbobbylashley">Msbobbylashley</a></h4>
<p class="avatar-list-birthday">Apr 14, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-12201882" title="Klem17"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-12201882" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8024718001808472701430005114400c8e03afb312fbf0e839e0bd49a5add50.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/Klem17">Klem17</a></h4>
<p class="avatar-list-birthday">Jan 1, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-13542066" title=".:Kikiko:."><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13542066" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1650518001245082753429510114400967768c56bfa12d5cda341d9d5bee2a1.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/.%3AKikiko%3A.">.:Kikiko:.</a></h4>
<p class="avatar-list-birthday">Apr 8, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-11977200" title="runinpunk1"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-11977200" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8281418001805472810929509114400aee0a6145e740a3136b047f3a29a8a5b.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/runinpunk1">runinpunk1</a></h4>
<p class="avatar-list-birthday">Dec 19, 2006</p>
<p>

</p></li>
	<li id="avatar-list-905974-11662543" title="skarocker"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-11662543" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/165051800921504280153000511440062542abe04137779242c3b114d40f1b9.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/skarocker">skarocker</a></h4>
<p class="avatar-list-birthday">Nov 28, 2006</p>
<p>

</p></li>
	<li id="avatar-list-905974-9693112" title="Asia6166"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-9693112" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/545096000963518700337250911440076866ad9016a0d0f3f2e682416c6fd12.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/Asia6166">Asia6166</a></h4>
<p class="avatar-list-birthday">Jul 22, 2006</p>
<p>

</p></li>
	<li id="avatar-list-905974-14293557" title="RetroMusic-,x"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14293557" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/16508185102151527521290091144001a602fc6f44fa4db77fb8aeda9a31dbe.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/RetroMusic-%2Cx">RetroMusic-,x</a></h4>
<p class="avatar-list-birthday">May 28, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-9534429" title="midozain"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-9534429" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8310918003225202851130006114400a9bf9fe1d754b85233eba2092e83f6fb.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/midozain">midozain</a></h4>
<p class="avatar-list-birthday">Jul 13, 2006</p>
<p>

</p></li>
	<li id="avatar-list-905974-14192689" title="NinjaFlareon"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14192689" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/8024318009215042851529009114400c066a098b4b08b952a01e94104c2e411.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/NinjaFlareon">NinjaFlareon</a></h4>
<p class="avatar-list-birthday">May 21, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-3137368" title="...Brianna..."><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-3137368" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/545116000963503700047301011440086e4c1d6a39e0a90b9de5052544d75a5.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/3137368/id">...Brianna...</a></h4>
<p class="avatar-list-birthday">Jun 2, 2005</p>
<p>

</p></li>
	<li id="avatar-list-905974-13910397" title="bikerider1"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13910397" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/1150118001240232801530006114400ac2a6a40f480241b729ad4488c2db1ac.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/bikerider1">bikerider1</a></h4>
<p class="avatar-list-birthday">May 5, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-14306972" title="WashingtonCaps"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14306972" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/165021800621011280082900911440089c7bb2eb96cd1a44de0e21e2851d5ff.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/WashingtonCaps">WashingtonCaps</a></h4>
<p class="avatar-list-birthday">May 29, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-14239436" title="flashydogg"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14239436" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/5000160007685067150373002114400d52f7d808e0f9f834da8e2ca5ea53323.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/flashydogg">flashydogg</a></h4>
<p class="avatar-list-birthday">May 25, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-14313068" title="First-Fight"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14313068" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/800211800925505280132900211440068e5bd9948990b2828e4b9cd2aef5434.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/First-Fight">First-Fight</a></h4>
<p class="avatar-list-birthday">May 29, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-12736861" title="G-Cmaster"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-12736861" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/16507205012551728015300061144006f9a8337c9abc45a95cb4b4b766defdf.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/G-Cmaster">G-Cmaster</a></h4>
<p class="avatar-list-birthday">Feb 8, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-14089103" title="L@Q"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-14089103" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/29501210011850328516100011144006fef69cb8566f5a284b979a0efd8f3cf.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/L%40Q">L@Q</a></h4>
<p class="avatar-list-birthday">May 13, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-13122217" title="-randomness?"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13122217" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/54509600086600972007725091144002ca9742366149199260b555b98212296.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/13122217/id">-randomness?</a></h4>
<p class="avatar-list-birthday">Mar 10, 2007</p>
<p>

</p></li>
	<li id="avatar-list-905974-13552087" title="hi-TheGreat"><div class="avatar-list-open"><a href="#" id="avatar-list-open-link-905974-13552087" class="avatar-list-open-link"></a></div>
<div class="avatar-list-avatar"><img src="/web/20071017031959im_/http://www.habbo.com/habbo-imaging/avatar/834016000182447715037300911440099ea3cc393f3cf9b3cb5b914f3ac2d65.gif" alt=""></div>
<h4><a href="/web/20071017031959/http://www.habbo.com/home/hi-TheGreat">hi-TheGreat</a></h4>
<p class="avatar-list-birthday">Apr 9, 2007</p>
<p>

</p></li>
</ul>

<div id="avatar-list-info" class="avatar-list-info">
<div class="avatar-list-info-close-container"><a href="#" class="avatar-list-info-close"></a></div>
<div class="avatar-list-info-container"></div>
</div>

</div>

<div id="avatar-list-paging">
    1 - 20 / 259
    <br>
    First |
    &lt;&lt; |
    <a href="#" class="avatar-list-paging-link" id="avatarlist-search-next">&gt;&gt;</a> |
    <a href="#" class="avatar-list-paging-link" id="avatarlist-search-last">Last</a>
<input type="hidden" id="pageNumber" value="1">
<input type="hidden" id="totalPages" value="13">
</div>

<script type="text/javascript">
Event.onDOMReady(function() {
	window.widget905974 = new MemberWidget('1007', '905974');
});
</script>

</div>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>

				</div>
				<div id="mypage-ad">
				</div>
			</div>
	</div>
</div>
@endsection
