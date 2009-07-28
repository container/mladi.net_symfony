<p>mainmenu: <br />
  Uporabnik vpišem vprašanje, sem anonimen, ni potrebna prijava, samo nickname, vprašanje in captcha. <br />
  Označim Kategorijo, za katerega specialista je vprašanje in vpišem svoj email, če želim obvestilo, <br />
  ko bo vprašanje odgovorjeno. </p>
<p>&nbsp;</p>
<p>Frontend: <br />
  - izpis vprašanj po kategorijah<br />
  - izpis vprašanj po svetovalcih<br />
  - detail odgovora</p>
<p>Iskalna orodja: <br />
  - browsanje po cloud, tag, <br />
</p>
<p>Backend: <br />
  - izpis čakajočih vprašanj glede na moj User. Po kategorijah, po času. <br />
</p>
<p>DATA MODEL</p>
<p>Vprašanje: <br />
  Naslov<br />
  Text<br />
  Nickname<br />
  time<br />
  kategorija_id<br />
</p>
<p>Odgovor: <br />
  Text<br />
  svetovalec_id<br />
  vprasanje_id<br />
  avtor<br />
  time<br />
</p>
<p>Svetovalec<br />
  Name<br />
  Surname<br />
  time<br />
  desc<br />
  img</p>
<p>Kategorija<br />
  name</p>
<p>Svetovalec_Kategorija<br />
  svetovalec_id<br />
  kategorija_id<br />
</p>
