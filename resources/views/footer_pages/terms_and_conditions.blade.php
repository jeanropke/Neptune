@extends('layouts.master', ['menuId' => '0'])

@section('title', 'Terms and Conditions')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('footer_pages.terms_and_conditions', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Terms and Conditions</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <span style="font-weight: bold;">Web Site Terms of Use</span><br><br>It is very important that you (and your parents, if you’re under
                                                18) review the following rules so that you know what you can and cannot do on www.habbohotel.com or other sites owned and operated by
                                                Sulake, Inc. Use of the site will be deemed acceptance. If you are not 18 years of age, have your parents review these Terms of Use and
                                                help you register. By registering and purchasing Habbo Coins you represent that your parents have joined in this agreement. PARENTS: If
                                                you have not joined in your child's agreement to these Terms of Use, please contact us at: contact.us@sulake.com. Parents are advised to
                                                exercise supervision over their children's on-line activities.<br><br>This agreement ("Agreement" or “Terms of Use”) between you and
                                                Sulake, Inc. (“Sulake") sets forth the terms and conditions which apply to the use by you of www.habbohotel.com (the “Hotel” or “Site”)
                                                or other sites owned and operated by Sulake and any other product or service offered by Sulake for use, subscription or sale
                                                (collectively, "Services"). Subject to the terms and conditions below, and your acceptance of them, Sulake agrees to grant, and you
                                                agree to take, a non-exclusive, non-transferable, single computer license to use and display the Services and related software for your
                                                personal (or household) non-commercial use by any machine(s) of which you are the primary user (“Limited Licensee”). Without limiting
                                                the forgoing, you agree not to use the contents of Services for any other use or purpose. You further agree that you will not, and will
                                                not attempt to, copy or distribute the content of the Services to any other person unless specifically permitted by Sulake or otherwise
                                                violate the single computer, non-commercial display and use Limited License granted hereunder.<br><br>If you do not understand and
                                                accept the provisions, do not use the Services. Your use of the Services shall be deemed to constitute your acceptance of this Agreement
                                                and all of Sulake’s rules and restrictions related to the Services, as they may change from time to time.<br><br>Basic
                                                Summary:<br><br>1. The activities and games in the Hotel or on other Services are just for you to play with while on the site. You can't
                                                sell them, give them to anyone, trade them for anything or pretend you made them. If you wish to do anything EXCEPT play with them, you
                                                must get our written permission first. You can display your personal Habbo avatar on your own personal web pages for your noncommercial
                                                and personal use ONLY, as long as you write "Copyright 2005 Sulake, Inc. All Rights Reserved. Used With Permission" on EVERY page with
                                                our pictures and/or text and you link directly to us. You can't pretend they are your own work. <br><br>2. All Sulake user profiles,
                                                character actions and content in or on the chat boxes and message boards are created by our users and not by Sulake. If you post nasty,
                                                insulting, sexually explicit, racially disparaging, religiously disparaging or other inappropriate content we have the right to delete
                                                it from the site without notice and to freeze or close your account (there will be no refunds of previously purchased Coins). This rule
                                                also applies to inappropriate Habbo names. Do not create names that are nasty, insulting, sexually explicit, racist, disrespectful of
                                                religions or otherwise inappropriate. We can see your messages, so keep it clean and friendly! The Hotel should be a clean and fun place
                                                for everyone. Do not abuse the chat functions by "spamming" (posting the same message many times) or using them to make "party boards" -
                                                this can result in warnings or a frozen account, too! Finally, if you ask for another user's password or personally identifiable
                                                information, for any reason, your account can be frozen or terminated. If you see anything inappropriate on the site, or if anyone sends
                                                you a message that makes you uncomfortable or asks for your password, please e-mail us immediately at:
                                                ANTISC.US@HABBOHOTEL.COM.<br><br>3. By creating a Habbo, by chatting in message rooms and posting on message boards, or sending us
                                                comments you are agreeing that Sulake can use your Habbo and/or content elsewhere on our Services, in our advertising, or in any media
                                                (now or hereafter known), throughout the universe and forever (including, without limitation, in connection with websites, television
                                                programs, motion pictures, games, merchandising and advertising), without a royalty or payment of any kind to you. So, this means we can
                                                use your character and information however we want for as long as we choose.<br><br>4. By submitting any other material to us, you (and
                                                your parents) are automatically granting us permission to use those materials for free in any manner we can think of forever throughout
                                                the universe. These materials must be created ONLY by the person submitting them - you cannot submit someone else's work. <br><br>5. You
                                                understand that Sulake may supervise chat rooms and filter content sometimes, but that we don’t have a duty to do this. You understand
                                                that bad people can use chat functions and that chat rooms can be dangerous places if you do not use caution and good sense. You agree
                                                not to give out any personal information including your password, your first and last name, your phone number, e-mail address, instant
                                                messenger screen name or other contact information and not to ask for personal information from other Habbos. Use common sense and
                                                follow the <a href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a>!<br><br>6. If you
                                                steal furniture or Coins from other Habbos, cheat on any of our games, use any hacking scripting or editing programs in the Hotel,
                                                violate the <a href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a> or break the
                                                law, we can freeze or terminate your account, or if appropriate, report you to the Police!<br><br>7. You understand that all purchases
                                                of Habbo Coins are final and non-refundable, except, in our sole and absolute discretion. Once you buy Coins you can’t get your money
                                                back. You understand that Habbo Coins will expire after one year, so use them while you can. Further, in Sulake’s sole discretion, Habbo
                                                accounts that are either unused or have been used only once for a period greater than six (6) months will be terminated. Purchases of
                                                Habbo Coins, or other products or services made available via the Site by Sulake are subject to the Terms and Conditions of Sale, which
                                                are incorporated herein by reference.<br><br>8. No one from Sulake will ever ask you for your password so do not EVER give it out. If
                                                someone does, please e-mail us at: ANTISC.US@HABBOHOTEL.COM.<br><br>9. Habbo eXperts are experienced users who may be able to help you
                                                find your way around the Hotel. However, Habbo eXperts are not employees or representatives of Sulake. Please use the same care in
                                                dealing with Habbo eXperts as you do with other users. If you have concerns about abuse in the Hotel please contact us at:
                                                CONTACT.US@HABBOHOTEL.COM.<br><br>Following is the "Long Version" of the Sulake Terms and Conditions:<br><br>PLEASE READ THESE TERMS AND
                                                CONDITIONS CAREFULLY BEFORE USING THIS WEBSITE.<br><br>Lawful Use:<br><br>The Hotel is intended for U.S. residents located in the fifty
                                                states and the District of Columbia 13 years of age or older. You agree to use the Services only as lawful in the United States, and all
                                                jurisdictions and subdivisions thereof, and in any nation and jurisdiction in the world, and all subdivisions thereof, with respect to
                                                which you use, access or reach out to with regard to the Services. Without limiting the foregoing, you agree not to post on or transmit
                                                through the Services any material which violates or infringes in any way upon the rights of others; is threatening, abusive or
                                                harassing; is defamatory; is invasive of privacy or publicity rights; is obscene; is lewd, lascivious, filthy, violent or otherwise
                                                objectionable; or which encourages conduct that would violate any law or give rise to civil or criminal liability under any law. You
                                                agree to abide by the terms and conditions of this Agreement, the <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a> and any additional terms,
                                                conditions, rules or procedures imposed by Sulake or by third-party content providers in connection with third-party content, software
                                                or services available on or through the Services.<br><br>Rights:<br><br>The content of the Services includes copyrighted materials,
                                                trademarks and other proprietary information, which may include, without limitation, text, software, photos, video, audio visual
                                                recordings, graphics, music and sound. The entire contents of the Services are copyrighted as a collective work under the United States
                                                copyright laws and/or similar laws of other jurisdictions. Sulake owns a copyright in the selection, coordination, arrangement and
                                                enhancement of such content, as well as in the content original to Sulake. Third-party content providers (other than users) own the
                                                copyright in content that is original to them. Habbo, Habbo Hotel™ and Sulake™ are trademarks and service marks of Sulake. All rights
                                                are reserved. All other trademarks and service marks appearing on the Services are the property of their respective owners, including,
                                                in some instances, Sulake. All rights are reserved. Use of any of our trademarks, service marks or names as “metatags” on other websites
                                                is prohibited. You may not display our Services or content in frames or “in-line links” without express written permission from Sulake
                                                (e-mail requests to contact.us@sulake.com).<br><br>You agree not to encumber, license, modify, publish, copy, sell, transfer, transmit
                                                or in any way exploit, any of the content of the Services, nor will you attempt to do so. You agree not to copy, redistribute, publish
                                                or otherwise exploit material which you download from the Services without the express prior written permission of Sulake and the owner
                                                of such material (from whom you are solely responsible for obtaining permission). You further agree and acknowledge that you shall not
                                                acquire any ownership rights by downloading material from the Services. You can display your personal Habbo avatar on your own personal
                                                web pages for your noncommercial and personal use ONLY, as long as you write "Copyright 2005 Sulake, Inc. All Rights Reserved. Used With
                                                Permission" on EVERY page with our pictures and/or text and you link directly to us.<br><br>Sulake does not solicit submissions,
                                                creative materials, ideas or suggestions other than those Sulake specifically requests. Any communications or materials you transmit to
                                                Sulake by electronic e-mail or otherwise including, without limitation, data, questions, comments, ideas, images, writings, music,
                                                sounds, audiovisual effects, artwork, design elements, graphics, suggestions, concepts, biographical information, notes or chat or
                                                message postings, will be treated as non-confidential and non-proprietary. You hereby unconditionally and irrevocably transfer and
                                                assign to Sulake, its parent and its and their affiliates, subsidiaries, successors, assigns and licensees, in perpetuity, the
                                                royalty-free right and license (with the right to sublicense) to use, reproduce, modify, adapt, publish, translate, create derivative
                                                works from, incorporate into other works, distribute, perform, display and otherwise exploit the material you send to Sulake, in all
                                                languages and throughout the universe, in any form, media or technology now known or hereafter devised. You acknowledge and expressly
                                                agree that any such communications or materials you transmit or post may be used by Sulake, its parent and its and their affiliates,
                                                subsidiaries, successors, assigns and licensees, for any purpose whatsoever, including, without limitation, developing, manufacturing
                                                and marketing products using such information, and you hereby waive the right to receive any financial or other consideration in
                                                connection with such information, including, without limitation, credit. (See <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/footer_pages/submissions_agreement.html">Submission
                                                    Agreement</a>, which is incorporated herein by reference)<br><br>You agree that all purchases of Habbo Coins are final. No refunds
                                                will be given, except in our sole and absolute discretion. You agree that all Habbo Coins will be forfeited if your account is
                                                terminated for any reason. All Habbo Coins will expire after one year(1) year. Further, in Sulake’s sole discretion, Habbo accounts that
                                                are either unused or have been used only once for a period greater than six (6) months will be terminated.<br><br>You agree that the
                                                purchase of Habbo Coins is the purchase of a subscription service and that you have no property interest in the Habbo Coins. You agree
                                                that Habbo Coins are not a gift certificate.<br><br>Usage Rules:<br><br>You agree not to use bots, spiders or intelligent agent software
                                                (or other methods) for any purpose other than accessing publicly posted portions of the Services and then only for the purposes
                                                consistent with the Limited License and these Terms of Use. You agree not to, or to attempt to, circumvent any access or use
                                                restrictions, data encryption or content protection related to the Services; not to data mine the Services and not to in any way cause
                                                harm to or burden the Services. You agree that you will not post on or transmit through the Services any advertising or commercial
                                                solicitation of any kind whatsoever, including, without limitation, via e-mail or chat, without Sulake's express prior written approval
                                                and, if then, solely in accordance with the terms and conditions imposed by Sulake with respect thereto. You further agree not to use
                                                the Services, or any element or portion thereof (including, without limitation, e-mail addresses of users), for any commercial purpose
                                                whatsoever. You agree not to use the Services in any way that abuses, defames, stalks, annoys, threatens or violates the rights of
                                                privacy, publicity, intellectual property or other legal rights of others (now or hereafter recognized) or to post, publish, distribute,
                                                disseminate or upload any inappropriate, infringing, defamatory, profane, indecent, obscene or illegal/unlawful matters, including,
                                                without limitation, information, topics, names or other material.<br><br>Without limiting the generality of the forgoing, you agree to
                                                read and strictly follow our User Code of Conduct Guidelines known as the <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a>, which are incorporated
                                                herein by reference.<br><br>Always use caution and common sense when using the Internet, especially when giving out any personally
                                                identifying information about yourself or with respect to financial information or transactions. Sulake does not control or endorse the
                                                content, messages or information found in user submitted portions of the Services or external sites that may be linked to or from the
                                                Hotel and, therefore, Sulake specifically disclaims any responsibility with regard thereto. Hobbas are Service users, like you, and not
                                                employees or representatives of Sulake, so caution and common sense should be used both in their presence and absence.<br><br>Additions
                                                and Changes:<br><br>You agree to review this Agreement on at least a weekly basis to be aware of Changes (as defined herein). Our
                                                employees cannot change the terms of this Agreement except as posted on these Services. Sulake has the right, at any time,
                                                to:<br><br>(a) add, change or discontinue any aspect or feature of the Services, including, but not limited to, content, financial
                                                terms, availability and equipment needed for access or use;<br>(b) impose, change or modify its terms and conditions applicable to your
                                                use of the Services, or any part thereof; and/or<br>(c) to impose, change or modify the terms and conditions of this Agreement
                                                ("Changes"). Such Changes shall be effective immediately upon notice by posting the Changes on Sulake’s Services or by any other method
                                                of notice Sulake deems appropriate. Any use of the Services by you after notice of the Changes, constitutes acceptance by you of such
                                                Changes.<br><br>Disclaimers; Limitations; and Waivers of Liability:<br><br>YOU EXPRESSLY AGREE THAT USE OF THE SERVICES IS AT YOUR SOLE
                                                RISK AND IS PROVIDED ON AN "AS IS" BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO,
                                                WARRANTIES OF TITLE OR IMPLIED WARRANTIES OF NON INFRINGEMENT, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE (EXCEPT ONLY TO THE
                                                EXTENT PROHIBITED UNDER THE LAWS APPLICABLE TO THIS AGREEMENT WITH ANY LEGALLY REQUIRED WARRANTY PERIOD TO THE SHORTER OF THIRTY DAYS
                                                FROM FIRST USE OR THE MINIMUM PERIOD REQUIRED). WITHOUT LIMITING THE FOREGOING, NEITHER SULAKE NOR ITS PARENT OR ITS OR THEIR AFFILIATES
                                                OR SUBSIDIARIES, OR ANY OF THEIR DIRECTORS, EMPLOYEES, AGENTS, ATTORNEYS, THIRD-PARTY CONTENT PROVIDERS, DISTRIBUTORS, LICENSEES OR
                                                LICENSORS WARRANT THAT THE SERVICES WILL BE UNINTERRUPTED OR ERROR FREE.<br><br>SULAKE MAY DISTRIBUTE CONTENT SUPPLIED BY THIRD PARTIES
                                                AND USERS OF THE SERVICES AND MAY PROVIDE LINKS TO EXTERNAL LOCATIONS OPERATED BY THIRD PARTIES. ALL COMMUNICATION EXPRESSED OR MADE
                                                AVAILABLE BY THIRD PARTIES WHATSOEVER, INCLUDING, WITHOUT LIMITATION, BY OTHER USERS, IS SOLELY MADE BY THE RESPECTIVE AUTHOR(S) OR
                                                DISTRIBUTOR(S), AND NEITHER SULAKE NOR ITS PARENT OR ITS OR THEIR AFFILIATES OR SUBSIDIARIES, OR ANY OF THEIR DIRECTORS, EMPLOYEES,
                                                AGENTS, ATTORNEYS, THIRD-PARTY CONTENT PROVIDERS, DISTRIBUTORS, LICENSEES OR LICENSORS GUARANTEE THE ACCURACY, COMPLETENESS OR
                                                USEFULNESS THEREOF, OR ITS MERCHANTABILITY OR FITNESS FOR ANY PARTICULAR PURPOSE; NOR DO THEY MAKE ANY GUARANTEE, ENDORSEMENT OR
                                                WARRANTY WITH RESPECT THERETO. YOU ACKNOWLEDGE THAT IT IS YOUR SOLE RESPONSIBILITY TO SEEK THE ADVICE OF PROFESSIONALS, AS APPROPRIATE,
                                                REGARDING THE EVALUATION OF ANY COMMUNICATION AND AGREE TO USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WITH RESPECT TO ALL COMMUNICATION
                                                AND TRANSACTIONS.<br><br>TO THE FULLEST EXTENT PERMITTED BY LAW, THE DISCLAIMERS OF LIABILITY CONTAINED HEREIN APPLY TO ANY AND ALL
                                                DAMAGES OR INJURY WHATSOEVER CAUSED BY OR RELATED TO USE OF, OR INABILITY TO USE, THE SERVICES UNDER ANY CAUSE OR ACTION WHATSOEVER OF
                                                ANY JURISDICTION, INCLUDING, WITHOUT LIMITATION, ACTIONS FOR BREACH OF WARRANTY, BREACH OF CONTRACT OR TORT AND THAT NEITHER SULAKE NOR
                                                ITS PARENT OR ITS OR THEIR AFFILIATES OR SUBSIDIARIES, OR ANY OF THEIR DIRECTORS, EMPLOYEES, AGENTS, ATTORNEYS, THIRD-PARTY CONTENT
                                                PROVIDERS, DISTRIBUTORS, LICENSEES OR LICENSORS SHALL BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY OR
                                                CONSEQUENTIAL DAMAGES IN ANY WAY WHATSOEVER ARISING OUT OF THE USE OF, OR INABILITY TO USE, THE SERVICES. YOU FURTHER SPECIFICALLY
                                                ACKNOWLEDGE THAT NEITHER SULAKE NOR ITS PARENT OR ITS OR THEIR AFFILIATES OR SUBSIDIARIES, OR ANY OF THEIR EMPLOYEES, AGENTS, ATTORNEYS,
                                                THIRD-PARTY CONTENT PROVIDERS, DISTRIBUTORS, LICENSEES OR LICENSORS ARE LIABLE, AND YOU AGREE NOT TO SEEK TO HOLD SULAKE OR ITS
                                                AFFILIATES, DIRECTORS, EMPLOYEES, AGENTS, ATTORNEYS, THIRD-PARTY CONTENT PROVIDERS OR LICENSORS LIABLE, FOR THE CONDUCT OF THIRD
                                                PARTIES, INCLUDING OTHER USERS OF THE SERVICES AND OPERATORS OF EXTERNAL SITES, AND THAT THE RISK OF THE SERVICES AND EXTERNAL SITES AND
                                                OF INJURY FROM THE FOREGOING RESTS ENTIRELY WITH YOU.<br><br>UNDER NO CIRCUMSTANCES WILL SULAKE OR ITS PARENT OR ITS OR THEIR AFFILIATES
                                                OR SUBSIDIARIES, OR ANY OF THEIR DIRECTORS, EMPLOYEES, AGENTS, ATTORNEYS, DISTRIBUTORS OR LICENSEES BE LIABLE TO YOU, COLLECTIVELY, FOR
                                                MORE THAN THE AMOUNT YOU HAVE PAID SULAKE.<br><br>YOU ACKNOWLEDGE THAT THE DISCLAIMERS, LIMITATIONS AND WAIVERS OF LIABILITY CONTAINED
                                                HEREIN WILL SURVIVE ANY TERMINATION OF YOUR ACCOUNT(S) OR ANY SERVICES.<br><br>PRIVACY POLICY<br><br>You agree that Sulake shall have
                                                the right, but not the obligation, to monitor the content of the Services and the use of Services by you and other users (including,
                                                without limitation, by keystroke capture) to determine compliance with this Agreement and for any other purpose deemed appropriate by
                                                Sulake and further that Sulake may use the information gathered during such monitoring for any purpose deemed appropriate by Sulake to
                                                the extent permitted by law and our <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/footer_pages/privacy_policy.html">Privacy Policy</a>, which is
                                                incorporated herein by reference. You further agree that, subject only to Sulake’s <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/footer_pages/privacy_policy.html">Privacy Policy</a>, as it
                                                may change from time to time, personal data provided by you to Sulake may be used, to the extent permitted by law, for any purpose
                                                Sulake deems appropriate and may, within Sulake's sole discretion, be given or sold to our affiliates or third parties. You acknowledge
                                                that you understand that when you disclose personal information (e.g., user name, e-mail address) on the Services, that information can
                                                be monitored, collected and used by others and may result in unsolicited messages from other users or other third parties and that
                                                Sulake cannot control such monitoring, collection and use. If you object to our sharing of your personal information, you may opt out as
                                                more fully explained in our <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/footer_pages/privacy_policy.html">Privacy Policy</a> and <a
                                                    href="https://web.archive.org/web/20071011205658/http://images.habbohotel.com/c_images/album43/Opt_Out_Notice.pdf">Opt-Out
                                                    Notice</a>.<br><br>Editing/Blocking:<br><br>You agree that Sulake, in its sole discretion, shall have the right, but not the
                                                obligation, to edit, refuse to post or remove any material submitted to or posted on the Services, for any reason whatsoever, including,
                                                without limitation, if Sulake considers that the material constitutes or promotes gambling or any illegal activity, or if Sulake
                                                considers the material to be pornographic, sexually explicit, lewd, lascivious, filthy, violent, harassing, in violation of the <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a> or otherwise objectionable.
                                                Notwithstanding the foregoing, you shall remain solely responsible for the content of material you upload, post or otherwise make
                                                available on the Services. Furthermore, you acknowledge that the Services may not be monitored and that you do not rely on Sulake to
                                                monitor or edit the Services and that the Services may contain content which you find offensive, and you hereby waive any objections you
                                                might have with respect to viewing such content.<br><br>External Locations / Linking:<br><br>The Services may contain links to external
                                                locations (e.g., other websites, etc.) and the ability to access external portions of the Internet. You agree that Sulake is not
                                                responsible for the availability of these external locations or the content thereon, including, without limitation, solicitations
                                                thereon or products or services made available thereby. You acknowledge that some external locations may contain materials or
                                                communications which are unedited, untrue, illegal in some jurisdictions and may be offensive. You agree to access external locations at
                                                your own risk and not to permit minors to have access to inappropriate material. You agree that Sulake shall not be held responsible or
                                                liable, directly or indirectly, for any loss or damage caused or alleged to have been caused in any way whatsoever related to any such
                                                external location and you hereby irrevocably waive any and all claims related thereto against Sulake. Any concerns regarding any
                                                external location should be directed to its respective site administrator, systems operator or webmaster and to
                                                contact.us@sulake.com.<br><br>Sulake hereby grants you a non-exclusive, limited licensee, revocable at Sulake’s discretion, for you to
                                                link to Sulake’s home page from any site that is not commercially competitive to Sulake and does not criticize or otherwise injure
                                                Sulake, so long as the site where the link resides, and all other locations to which such site links, comply with all applicable laws
                                                and do not in any way abuse, defame, stalk, threaten or violate the rights of privacy, publicity, intellectual property or other legal
                                                rights of others or, in any way, post, publish, distribute, disseminate or facilitate any inappropriate, infringing, defamatory,
                                                profane, indecent, obscene or illegal/unlawful information, topic, name or other material. All of Sulake’s rights and remedies are
                                                expressly reserved.<br><br>Indemnification:<br><br>You agree to defend, indemnify and hold harmless Sulake, its parent, and its and
                                                their subsidiaries, affiliates, directors, employees, agents, attorneys, distributors, third-party content providers, licensees and
                                                licensors from and against all claims and expenses, including attorneys' fees and costs, arising out of your use of the Services and/or
                                                your breach or alleged breach of any term, condition, obligation, representation or warranty in this Agreement. You agree that the
                                                provisions in this paragraph will survive any termination of your account(s) or the Services.<br><br>Equipment:<br><br>You agree to be
                                                responsible for obtaining and maintaining all telephone, computer hardware and other equipment needed for access to and use of the
                                                Services, and you shall be responsible for all charges related thereto.<br><br>Governing Law:<br><br>This Agreement and all aspects of
                                                the Services shall be governed by and construed in accordance with the internal laws of the United States and the State of California
                                                governing contracts entered into and to be fully performed in California (i.e., without regard to conflict of laws provisions)
                                                regardless of your location. You acknowledge that the rights granted and obligations made hereunder to Sulake are of a unique and
                                                irreplaceable nature, the loss of which shall irreparably harm Sulake and which cannot be replaced by monetary damages alone so that
                                                Sulake shall be entitled to injunctive or other equitably relief (without the obligations of posting any bond or surety) in the event of
                                                any breach or anticipatory breach by you. You irrevocably waive all rights to seek injunctive or other equitable relief and agree to
                                                limit your claims to claims for money damages (if any). You agree that any suit, action or proceeding arising out of or relating to this
                                                Agreement or any of the transactions contemplated herein or related to the Services or any contests or services thereon (including
                                                without limitation, statutory, equitable or tort claims) shall be resolved solely by binding arbitration before a sole arbitrator under
                                                the rules and regulations of the American Arbitration Association (“AAA”); provided, however, that notwithstanding the parties’ decision
                                                to resolve any and all disputes arising under this Agreement through arbitration, Sulake may bring an action in any court of applicable
                                                jurisdiction to protect its intellectual property rights or to seek to obtain injunctive relief or other equitable from a court to
                                                enforce the provisions these Terms of Use or to enforce the decision of the arbitrator. The arbitration shall be held in Los Angeles,
                                                California. The arbitrator shall apply the substantive laws of the State of California, shall issue a written decision, and shall have
                                                the power to award any legal remedies consistent with this Agreement except for punitive, exemplary or special damages. The parties will
                                                split the arbitrator’s fee. You agree that the provisions in this paragraph will survive any termination of your account(s) or the
                                                Services.<br><br>Miscellaneous:<br><br>Sulake operates and controls the Site from its offices in the United States. Sulake makes no
                                                representation that the Site is appropriate or available in other locations. Accordingly, those persons who choose to access the Site
                                                from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local
                                                laws are applicable. Software from this Site may be subject to United States export controls. Thus, no software from this Site may be
                                                downloaded, exported or re-exported (a) into (or to a national or resident of) Cuba, Iraq, North Korea, Iran, Syria, or any other
                                                country to which the United States has embargoed goods; or (b) to anyone on the U.S. Treasury Department's list of Specially Designated
                                                Nationals or the U.S. Commerce Department's Table of Deny Orders. By downloading any software, you represent and warrant that you are
                                                not located in, under the control of, or a national or resident of, any such country or on any such list. These Terms and Conditions are
                                                effective until terminated by either party. Users may terminate this Agreement by destroying all service-related materials (including
                                                without limitation, all related documentation and all copies and installations thereof, whether made under these Terms of Use or
                                                otherwise) obtained from the Services, Sulake or any other website or source. The privileges granted to you under this Agreement will
                                                terminate immediately and automatically without notice from Sulake if, in our sole discretion, you fail to comply with any term or
                                                provision of these Terms of Use. This Agreement contains the entire understanding of you and Sulake, and supersedes all prior
                                                understandings of the parties hereto relating to the subject matter hereof, and cannot be changed or modified by you except by a writing
                                                signed by an authorized signatory for Sulake. If any provision of this Agreement is found to be illegal or unenforceable, the Agreement
                                                will be deemed curtailed to the extent necessary to make it legal and enforceable and will remain, as modified, in full force and
                                                effect. No waiver by either party of any breach or default hereunder shall be deemed to be a waiver of any preceding or subsequent
                                                breach or default. The section headings used herein are for convenience only and shall not be given any legal import. You hereby waive
                                                any and all defenses you may have based on the electronic form of this Agreement and the lack of signing by the parties hereto to
                                                execute this Agreement.<br><br>Complaints or Notices:<br><br>Sulake takes claims of infringement of intellectual property rights,
                                                defamation and violation of rights of privacy or publicity very seriously and complies with the complaint procedures of the Digital
                                                Millennium Copyright Act. If you believe that any of the material that is or was on our Services infringes or has infringed any rights,
                                                including copyrights or trademarks, owned by you, or by an owner for which you are authorized to act, please refer to our <a
                                                    href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Complaint Policy</a> included as part of
                                                the <a href="https://web.archive.org/web/20071011205658/http://www.habbo.com/help/habbo_way.html">Habbo Way</a>.<br><br>For all other
                                                correspondence and complaints of a non-legal nature, please e-mail:<br><br>contact.us@sulake.com.<br><br>Last updated: September 30,
                                                2005.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>

                <td rowspan="2" style="width: 4px;"></td>

                <td rowspan="2" valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
