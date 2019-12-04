<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg">

    <div class="login-wrapper">
        <div class="header col-lg-12 col-xs-12 ">

            <div class="col-lg-4 col-xs-12 logo">
                <p id="plogo">
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/loog-carre1000x1000.png" alt="logo"/>
                </p>
            </div>
           <div class="topnav col-lg-8 col-xs-12" id="myTopnav">
                <a id="logo-res" >                   
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/logo-favicon-carre-1000.png" alt="logo"/>
                </a>
                <?php
                if (isset($connected)) {
		    echo '<a href = "' . base_url() . 'user/login_controller/logout">Déconnexion</a>';
                    echo '<a href = "' . base_url() . 'user/UserProfile_controller">Mon Profile</a>';
                   
                } else {
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>

		        <a href = "<?php echo base_url()?>welcome/gotoConcept" class="">Le concept</a>
		 <a href = "<?php echo base_url()?>welcome/" class="">Accueil</a>
		
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>


	    <div class="clearfix"></div>
        <div class=" col-lg-12 col-xs-12 content">

            <div class="row">
                <div class=" col-12 accroche">
                    <img id="about" src="<?php echo base_url() ?>assets/images/img_about.jpg">
                    <p><i>"Conditions générales de vente : Realdate"</i></p>                
                </div>
            </div>
           
            <div class="col-10 event about">
            <h2>
            
            </h2>
                <p>
					Les termes employés ci-après ont, dans les présentes Conditions Générales de Ventes et d’Utilisation, la signification suivante :
« Billet de participation » désigne la place qui permet de participer à des évènements de type speed dating organisés par le Prestataire. Le speed dating consiste en une succession de discussions en tête-à- tête avec plusieurs personnes permettant de rencontrer des célibataires. Ils sont réservés aux particuliers uniquement.
« le Client » désigne toute personne, majeure et célibataire, qui s’inscrit et achète des Billets de participation pour les évènements.
« les Conditions Générales » désigne les présentes Conditions Générales de Vente et d’Utilisation.
« les Parties » désigne ensemble le Client et le Prestataire.
« le Prestataire » désigne la société RealDate SAS au capital de 100 euros, dont le siège social est situé à 1192 chemin d'aix 13840 Rognes - France et immatriculée au Registre du Commerce et des Sociétés de Salon de provence 834-402-238
« http://www.realdate.fr » désigné  

                </p>
                  <h2>
            Article 1 - Objet et Champ d’application
            </h2>
                <p>
				Les présentes Conditions Générales s'appliquent, sans restriction ni réserve, à toutes commandes électroniques ou téléphoniques ou postales de Billet de participation à des évènements organisés et proposés par le Prestataire au Client :
- soit directement sur son Site accessible à l’adresse suivante :
- soit par téléphone au numéro
- soit par courrier envoyé à l'adresse postale du Prestataire, renseignée dans le Préambule.
Pour les commandes passées depuis l’Etranger, l’inscription par téléphone n’est pas possible, elle ne peut être faite qu'uniquement sur le Site.
Les caractéristiques principales des Services, sont présentées sur le Site.
Le Client est tenu d’en prendre connaissance avant la création d’un Compte Client (espace personnel) et de tout achat de Billet(s) de participation.
Le choix et l’achat d’un Service est la seule responsabilité du Client.
Les coordonnées du Prestataire sont renseignées dans le Préambule.
Ces conditions s’appliquent à l’exclusion de toutes autres conditions, et notamment celles applicables pour d’autres circuits de commercialisation des Services. Ces Conditions Générales sont accessibles à tout moment sur le Site et prévaudront, le cas échéant, sur toute autre version ou tout autre document contradictoire.
L'utilisation du Site, de toute fonctionnalité du Site disponible à l'adresse		implique l'acceptation expresse, préalable, pleine et entière par le Client des présentes Conditions Générales.
Conformément à la loi Informatique et Libertés du 6 janvier 1978, le Client dispose, à tout moment, d'un droit d'accès, de rectification, et d'opposition à l'ensemble de ses données personnelles en écrivant, par courrier et en justifiant de son identité à  RealDate SAS au capital de 100 euros, dont le siège social est situé à 1192 chemin d'aix 13840 Rognes - France
Le Client déclare avoir pris connaissance des présentes Conditions Générales et les avoir acceptées en cochant la case prévue à cet effet avant la mise en œuvre de la procédure de commande en ligne ou par téléphone ainsi que les conditions d’utilisation du Site.
La création d’un Compte Client et l’achat de place(s) sur le Site ainsi que la participation à une ou plusieurs soirée(s) Speed Dating implique la pleine et entière adhésion aux Conditions Générales.
Sauf preuve contraire, les données enregistrées par REALDATE constituent la preuve de l'ensemble des transactions passées par le Prestataire et le Client via le Site.
Ces Conditions Générales pouvant faire l'objet de modifications ultérieures, la version applicable à l'achat du Client est celle en vigueur sur le Site à la date de passation de la commande.
Les Billets de participation vendus par le Prestataire sur le Site sont réservés aux particuliers.
Lorsque les Billet(s) de participation proposé(s) sur le Site concerne(nt) un évènement se déroulant en Suisse, les droits de douane ou autres taxes locales ou droits d’importation ou taxes d’Etat, susceptibles d’être exigibles seront à la charge du Client.
Lorsqu’un Client souhaite inviter un ami et fournit au Prestataire les coordonnées de ce dernier, il s’engage à avoir préalablement obtenu de cet ami le consentement exprès de ce dernier au traitement de données par le Prestataire.


                </p>
                <h2>Article 2 - Commandes</h2>
                <p>Le Client peut passer commande directement via le Site.
Le Client peut passer commande par téléphone au numéro 			 depuis un
poste fixe hors surcoût éventuel selon l’opérateur du Client) du lundi au vendredi hors jours fériés de
10H à 15H. Depuis l’Etranger, l’inscription par téléphone n’est pas possible.
Le Client peut passer commande par voie postale en envoyant un courrier à l'adresse du Prestataire renseignée dans le Préambule.
Le Client sélectionne sur le Site l’évènement auquel il désire participer ; il choisit la date, la ville et le nombre de place(s) qu’il souhaite acheter.
Ces événements se déroulent dans toute la France et en Suisse. Ils sont classés par ville / région / département / date sur le Site.
Ces évènements se déroulent dans des établissements de type bar ou restaurant.
Les personnes intéressées pour participer à un Speed Dating proposé par le Prestataire doivent être âgées de 18 ans ou plus.
Elles s'inscrivent sur le Site en achetant une ou plusieurs places pour eux-mêmes et/ou leurs ami(e)s. 
Tant que la soirée prévue à une date donnée est affichée sur le Site alors il reste des places disponibles.
Après sa sélection, le Client peut consulter un récapitulatif de ses réservation en cliquant sur son panier (lien en haut à droite).
La soirée sera confirmée, selon les modalités de l’article Confirmation - Report des présentes Conditions Générales.
Le Client doit vérifier l'exactitude de la commande, notamment les éléments (ville où se déroule la soirée, horaire, tarif, nombre de place(s) et le total à payer, et signaler immédiatement toute erreur. Si le récapitulatif ne correspond pas à ses souhaits, il doit alors veiller à modifier la commande en supprimant les places en trop à l’aide des boutons « +/- » ou du bouton « corbeille » et en choisissant éventuellement d’autres places en accord avec ses attentes (bouton « Continuer mes achats »).
Les informations contractuelles sont présentées en langue française et font l'objet d'une confirmation au plus tard au moment de la validation de la commande par le Client.
La vente des billets de participation ne sera considérée comme définitive qu'après l'envoi au Client de la confirmation de l'acceptation de la commande par le Prestataire, par courrier électronique et après encaissement par celui-ci de l'intégralité du prix.
Toute commande passée sur le Site constitue la formation d'un contrat conclu à distance entre le Client et le Prestataire. Une confirmation d’inscription est envoyée par courrier électronique.
L’inscription n’est définitivement confirmée et n’engage le Prestataire qu’à l’envoi du courrier électronique confirmant que l’inscription à l’évènement a bien été validée. En conséquence, le Prestataire invite le Client à consulter sa messagerie électronique ou, le cas échéant, à téléphoner au Prestataire au numéro indiqué à l’article 16 des Présentes.
Le Prestataire se réserve le droit d'annuler ou de refuser toute commande d'un Client avec lequel il existerait un litige relatif au paiement d'une commande antérieure. Le Prestataire se réserve le droit de refuser l’entrée à un participant dont l’attitude ou la tenue vestimentaire serait incorrecte.
</p>
          
            <h2>Article 3 - Tarifs</h2>
            <p>Les Billets de participation proposés par le Prestataire sont fournis aux tarifs en vigueur sur le Site, au jour de l’enregistrement de l’inscription du Client aux évènements. Les prix sont exprimés sur le Site en Euros, HT et TTC ; le cas échéant, le risque de change étant à la charge du Client. Le Prestataire est assujetti à la TVA
Les tarifs tiennent compte d'éventuelles réductions qui seraient consenties par le Prestataire à certains groupes de clients ou dans certaines villes, dans les conditions précisées sur le Site. Le Prestataire se réserve le droit de modifier les prix des Services à tout moment mais les Services seront facturés sur la base des tarifs en vigueur au moment de l’inscription. Le paiement demandé au Client correspond au montant total de l'achat. Une facture est établie par le Prestataire et remise au Client lors de la confirmation d’inscription.
</p>
            <h2>Article 4 - Conditions de paiement</h2>
            <p>Le fait de passer commande par téléphone ou par courrier ou de valider son inscription sur le Site implique l’obligation à la charge du Client de payer le prix indiqué. Le prix du Billet de participation est payable comptant, en totalité au jour de l’inscription par le Client et selon les modalités indiqués à l’article 2 des présentes Conditions Générales, par voie de paiement sécurisé. Quatre modes de paiement sont proposés sur le Site :
- Par carte bancaire via la plateforme sécurisée du site,
- Par compte PayPal (ou par carte bancaire via la plateforme sécurisée de PayPal),
- Par chèque bancaire,
- Par virement bancaire.
Les cartes bancaires acceptées sont : carte bleue, visa, mastercard, eurocard. Le paiement par carte bancaire est totalement sécurisé, seule la banque Crédit Mutuel (ou PayPal, leader mondial du paiement par Internet) dispose des données que le Client va saisir, sous une forme exclusivement cryptée. En outre, l’établissement bancaire du Client peut demander un code d’authentification complémentaire (système 3D secure) pour vérifier que le Client est bien le propriétaire de la carte. Ce procédé d’identification étant spécifique à chaque banque, il appartient à chaque Client de vérifier auprès de sa banque le procédé d’authentification utilisé (carte de clefs et/ou envoi d’un SMS et/ou envoi d’un mail). Un seul mode de paiement est autorisé par achat de billet(s) de participation.
En cas de paiement par chèque celui-ci doit être émis par une banque domiciliée en France métropolitaine ou à Monaco. La mise à l'encaissement du chèque est réalisée à réception. Le paiement par chèque ou virement bancaire équivaut à une prise d’option et nécessite un délai de dix (10) jours ouvrés minimum pour permettre la bonne réception du règlement du Client. L’adresse à laquelle doit être envoyé le chèque est REAL DATE, Service Inscriptions,  RealDate SAS au capital de 100 euros, dont le siège social est situé à 1192 chemin d'aix 13840 Rognes - France
En cas de paiement par virement bancaire, le RIB du compte vers lequel envoyer le virement est indiqué sur le dernier écran de la commande.
Les paiements effectués par le Client ne seront considérés comme définitifs qu'après encaissement effectif des sommes dues, par le Prestataire. En outre, le Prestataire se réserve le droit, en cas de non-respect des conditions de paiement figurant ci-dessus, de suspendre ou d'annuler la l’achat du Billet de participation commandés par le Client. Aucun frais supplémentaire, supérieur aux coûts supportés par le Prestataire pour l'utilisation d'un moyen de paiement ne pourra être facturé au Client.
Le Prestataire n’étant pas maître des délais postaux, dans le cas où le chèque bancaire du Client ou les fonds virés parviennent trop tard au Prestataire, l’inscription du Client est automatiquement validée pour la date suivante proposée dans la même ville. Si le règlement n’est pas parvenu au Prestataire au plus tard le surlendemain de l’évènement, la commande est annulée.
</p>
            <h2>Article 5 - Réservations des Billets de participation</h2>
            <p>Le Client réserve ses Billets de participation en ligne au moyen du formulaire d’inscription, par voie postale, ou pour la France, par téléphone. Pour que la commande soit validée et les Billets de participation réservés, le Client devra accepter, en cliquant à l’endroit indiqué sur le Site, les présentes Conditions Générales.
Certains évènements ou produits proposés sur le Site présentent des conditions particulières spécifiées dans la fiche évènement ou la fiche produit. Ces conditions particulières de vente complètent le cas échéant les Conditions Générales et sont réputées lues et acceptées par le Client lors de l’acceptation des Conditions Générales.
Toute commande vaut acceptation des prix et descriptions des prestations proposées. L’inscription au Speed Dating est définitive dès réception du paiement du Client. Le paiement par carte bancaire ou compte Paypal permet une inscription immédiate, sauf si PayPal doit prélever les fonds sur le compte bancaire du Client, auquel cas le paiement peut être différé. L’inscription est différée en cas de paiement par chèque ou virement bancaire jusqu’à l’encaissement effectif des sommes dues.
La commande de Billet(s) de participation n’est définitivement confirmée et n’engage le Prestataire qu’à réception du courrier électronique de confirmation de l’inscription ; l’inscription du Client étant consultable sur son compte dans la rubrique « Mes réservations ». La commande ne peut plus être annulée. Le Prestataire n’envoie pas de billet physique ni numérique pour participer au Speed Dating.
Le lieu de tenue de l’évènement n'est jamais indiqué à l'avance sur le Site mais un secteur approximatif, ville ou quartier, dans lequel il se situe peut être mentionné. Dans tous les cas, cette mention du secteur est indicative mais pas contractuelle et le lieu où se tiendra le Speed Dating peut être se situer dans un rayon de 10 kilomètres autour du secteur initialement indiqué. L'adresse exacte du lieu est communiqué uniquement aux Clients afin de préserver la tranquillité des Clients. Les soirées se déroulent uniquement dans des établissements ouverts au public. Lors de l’accès à la soirée, le Client devra présenter le code participant à 8 chiffres reçu :
- soit par SMS de confirmation,
- soit par convocation imprimée (reçue par courrier électronique au format PDF),
- soit par confirmation affichée dans le compte-client (si le Client dispose d’un accès Internet mobile).
</p>

            <h2>Article 6 - Modification de la Réservation</h2>
            <p>Le Client a la possibilité de modifier sa réservation jusqu’à la confirmation de l’évènement mais en aucun cas de l’annuler, le contrat étant conclu de façon définitive dès la passation de la commande et l’achat du Billet de participation par le Client. Tant que l’évènement n’a pas été confirmé, le Prestataire permet au Client de modifier sa participation pour effectuer les actions suivantes :
- Mettre sa participation en attente afin de la réactiver plus tard,
- L’échanger pour une autre ville ou à une autre date.
Toute modification de la réservation par le Client - mise en attente ou changement de ville et/ou date - équivaut à la génération d'un avoir non remboursable.
Le Prestataire indique au Client que toute participation laissée en attente est automatiquement et définitivement abandonnée au bout de quatre-vingt- dix (90) jours.
</p>
            <h2>Article 7 - Confirmation - Report</h2>
            <p>Le Prestataire s'engage à faire ses meilleurs efforts pour fournir les Services commandés par le Client, dans le cadre d'une obligation de moyen aux dates et villes indiquées.
Au plus tard la veille de l’évènement à 21h00, le Client recevra une notification de Confirmation (ou de Report) de l’évènement par courrier électronique, SMS et affichage dans le compte-client, rubrique « Mes Participations », sous réserve que les rubriques correspondantes aient été bien renseignées.
En cas d’inscription après 21h00 la veille de la tenue de l’évènement, la confirmation (ou le report) pourra être notifiée au Client le jour même de l’évènement jusqu’à 15h00.
En cas de report de l’évènement, le Prestataire indiquera au Client les possibilités d’échange pour un autre évènement dans la même ville ou dans une autre ville ou à une date ultérieure. Il indiquera également au Client les modalités de remboursement si la date de report ne lui convient pas.
</p>

            <h2>Article 8 - Absence de Droit de rétractation - Remboursement</h2>
            <p>Conformément aux dispositions de l’article L.221-28 du nouveau Code de la consommation et compte tenu de la nature des Services, les Billets de participation aux évènements ne font pas l’objet d’un droit de rétractation. Le contrat est donc conclu de façon définitive dès la passation de la commande par le Client selon les modalités précisées aux Conditions Générales.
En cas d’annulation de l’évènement par le Prestataire, le Prestataire informera le Client du report de l’évènement ou le remboursement intégral de son(ses) billet(s) de participation. Le Client dispose de 72 heures à compter du jour de l’annulation pour effectuer sa demande de remboursement. Ladite demande étant effectuée dans le délai imparti en cliquant sur le bouton « Demander un remboursement » présent dans la rubrique « Mes Participations » du compte-client. Au-delà de ce délai, le Client est automatiquement réinscrit à la date de report indiquée et aucun remboursement ne pourra avoir lieu au titre de cette annulation.
Dès la réception de la demande de remboursement, le remboursement est effectué sur la base du prix du Billet de participation et le Prestataire remboursera le Client par le même moyen de paiement que pour l’Achat à défaut d’accord des parties pour l’utilisation d’un autre moyen de paiement sans frais supplémentaire à la charge du Client. Conformément aux dispositions de l’article L.216-3 du nouveau Code de la consommation, le Prestataire rembourse le Client de la totalité des sommes versées, au plus tard dans les quatorze jours suivants la date à laquelle le contrat a été dénoncé.
</p>
            <h2>Article 9 - Responsabilités
<br>9.1 - Responsabilité de REAL DATE
</h2>
            <p>Le Prestataire a pour mission de mettre en contact des Clients ayant émis réciproquement le souhait de participer aux Services et de transmettre les coordonnées des Clients qui l’auraient demandé expressément. Les soirées sont organisées de façon à maintenir l’anonymat des Clients, ces derniers se voient attribuer un numéro afin de les identifier.
Le Prestataire ne peut en aucun cas être tenu pour responsable du comportement ou des agissements du Client en dehors du cadre des évènements. Le Prestataire n’est ni un conseil ni un courtier matrimonial : l’objet des soirées n’est pas la conclusion d’un mariage ou l’établissement d’une relation sentimentale durable, et ce quelles que soient les attentes du Client lors de l’achat de son Billet de participation.
Ses obligations se limitant à vendre des Billets de participation à des soirées de speed dating, le Prestataire ne peut garantir le succès de la mise en relation de deux participants aux évènements. Dès lors, le Prestataire ne peut être tenu pour responsable dans le cas où la participation à une soirée ne génère aucune mise en relations entre les Clients.
En outre, le Prestataire ne saurait garantir un nombre minimal de rencontres effectuées lors du Speed Dating, car ne pouvant être tenu responsable des absences de certains participant(e)s.
</p>
            <h2>9.2 - Responsabilité et obligations du Client</h2>
            <p>Dans un souci de garantir l’intégrité des Services proposés, le Client est tenu d’être célibataire au moment de l’achat de son Billet de participation. Le Client certifie être majeur et avoir lu et accepté les Conditions Générales et reconnaît qu’il est pleinement informé et qu’il est tenu par l’ensemble des dispositions des Conditions Générales. Le Client est tenu de se présenter en tenue correcte aux évènements et de se comporter de façon appropriée. Le Client en participant aux soirées accepte de devenir client de l’établissement dans lequel l’évènement est organisé et doit se conformer aux conditions d’accès à l’établissement et à son règlement.
Il s’interdit au cours des évènements de tenir tout propos contrevenant aux droits d’autrui ou à caractère diffamatoire, injurieux, obscène, offensant, violent ou incitant à la violence, raciste ou xénophobe et de manière générale tous propos contraires aux lois et aux règlements en vigueur, aux droits des personnes ou aux bonnes mœurs. Le Client s’engage à ne pas acheter de Billet de participation à des fins de racolage ou de prostitution, ni à propager un quelconque prosélytisme.
</p>
            <h2>Article 10 - Informatiques et Libertés</h2>
            <p>En application de la loi 78-17 du 6 janvier 1978, il est rappelé que les données nominatives qui sont demandés au Client sont nécessaires au traitement de sa commande et à l'établissement des factures. Ces données peuvent être communiquées aux éventuels partenaires du Vendeur chargés de l'exécution, du traitement, de la gestion et du paiement des commandes.
Le traitement des informations communiquées par l'intermédiaire du Site a fait l'objet d'une déclaration auprès de la CNIL sous le numéro 		. Le Client dispose, conformément aux réglementations nationales et européennes en vigueur d'un droit d'accès permanent, de modification, de rectification et d'opposition s'agissant des informations le concernant. Ce droit peut être exercé dans les conditions et selon les modalités définies sur le Site.
</p>
            <h2>Article 11 - Propriété Intellectuelle</h2>
            <p>Le contenu du Site est la propriété du Prestataire et de ses partenaires et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle. Toute reproduction totale ou partielle de ce contenu est strictement interdite et est susceptible de constituer un délit de contrefaçon.
En outre, Le Prestataire reste propriétaire de tous les droits de propriété intellectuelle sur les photographies, présentations en vue de la fourniture des Services au Client. Le Client s'interdit donc toute reproduction ou exploitation desdites photographies, présentations sans l'autorisation expresse, écrite et préalable du Prestataire qui peut la conditionner à une contrepartie financière.
</p>
            <h2>Liens externes :</h2>
            <p>Le Site peut contenir des liens hypertextes vers des sites tiers. Le Prestataire informe le Client que cette politique de sécurisation des données personnelles ne s’applique pas aux sites tiers vers lesquels il créé un lien hypertexte. Ainsi, il ne peut être tenu pour responsable de la politique de sécurisation des données personnelles de ces sites tiers. Le Prestataire informe également le Client qu’il ne dispose pas de moyens de contrôle de ces sites tiers ni de leur contenu. Ainsi, le Prestataire ne peut en aucun cas être tenu pour responsable d’un défaut de sécurisation des données à caractère personnel de la part de ces sites tiers ni de leur légalité et/ou de leur contenu. Lorsque le Prestataire fournit des liens vers d’autres sites internet, il recommande au Client de ne pas utiliser ces derniers et ne donne aucune garantie quant à leur légalité, exactitude et contenu.</p>
           
           <h2>Article 12 - Droit applicable - Langue</h2>
           <p>Les Conditions Générales et les opérations qui en découlent sont régies et soumises au droit français. Les Conditions Générales sont rédigées en langue française. Dans le cas où elles seraient traduites en une ou plusieurs langues étrangères, seul le texte français ferait foi en cas de litige.</p>
           
           <h2>Article 13 - Litiges</h2>
           <p>TOUS LES LITIGES AUXQUELS LES OPÉRATIONS D'ACHAT ET DE VENTE CONCLUES EN APPLICATION DES PRÉSENTES CONDITIONS GÉNÉRALES DE VENTE POURRAIENT DONNER LIEU, CONCERNANT TANT LEUR VALIDITÉ, LEUR INTERPRÉTATION, LEUR EXÉCUTION, LEUR RÉSILIATION, LEURS CONSÉQUENCES ET LEURS SUITES ET QUI N'AURAIENT PU ÊTRE RÉSOLUES ENTRE LE PRESTATAIRE ET LE CLIENT SERONT SOUMIS AUX TRIBUNAUX COMPÉTENTS DANS LES CONDITIONS DE DROIT COMMUN.
Conformément aux dispositions de l’article L. 612-1 du nouveau Code de la consommation, le Client est informé qu'il peut en tout état de cause recourir gratuitement à un médiateur de la consommation en vue de la résolution amiable du litige qui l’oppose à un professionnel ou auprès des instances de médiation sectorielles existantes, ou à tout mode alternatif de règlement des différends en cas de contestation.
</p>
           <h2>Article 14 - Information précontractuelle - Acceptation du Client</h2>
           <p>Le Client reconnaît avoir eu communication, préalablement à la passation de sa commande et à la conclusion du contrat, d'une manière lisible et compréhensible, des présentes Conditions Générales et de toutes les informations listées à l'article L. 221-5 du nouveau Code de la consommation, et notamment les informations suivantes :
- les caractéristiques essentielles des Services, compte tenu du support de communication utilisé et du Service concerné,
- le prix des Services et des frais annexes,
- en l'absence d'exécution immédiate du contrat, la date ou le délai auquel le Prestataire s'engage à fournir les Services commandés,
- les informations relatives à l'identité du Prestataire, à ses coordonnées postales, téléphoniques et électroniques, et à ses activités, si elles ne ressortent pas du contexte,
- les informations relatives aux garanties légales et contractuelles et à leurs modalités de mise en œuvre,
- les fonctionnalités du contenu numérique et, le cas échéant, à son interopérabilité,
- la possibilité de recourir à une médiation conventionnelle en cas de litige,
- les informations relatives à l’absence du droit de rétractation,
- les moyens de paiement acceptés.
Le fait pour une personne physique, de commander sur le Site emporte adhésion et acceptation pleine et entière des présentes Conditions Générales et obligation au paiement des Billets de participation commandés, ce qui est expressément reconnu par le Client, qui renonce, notamment, à se prévaloir de tout document contradictoire, qui serait inopposable au Prestataire.
</p>
<h2>Article 15 - Force Majeure</h2>
<p>Le Prestataire est dégagé de toute responsabilité en cas de force majeure, dont notamment le dysfonctionnement du réseau Internet, des lignes téléphoniques, du matériel de réception empêchant ou entravant l'utilisation du Site.</p>
   <h2>Article 16 - Relation Clients</h2>
   <p>Pour toute information, question, réclamation, le Client peut s’adresser :
- directement sur le Site via la rubrique « Contactez-nous »
- en remplissant le formulaire de contact,
- par voie électronique à l’adresse
- par voie postale en écrivant à l’adresse suivante :
RealDate SAS au capital de 100 euros, dont le siège social est situé à 1192 chemin d'aix 13840 Rognes - France


</p>
		      </div>
   <div class="row">   

               
               
            </div>


        </div>
        

  


  
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

