<!-- projet n°1 -->
<?php

echo "<table border>
<tr>
  <th>nombre</th>
  <th>carré</th>
  <th>racine</th>
</tr>";

for ($i=0; $i <= 11 ; $i++) {
  echo "<tr>
<td>".$i."</td>
<td>".$i*$i."</td>
<td>".sqrt($i)."</td>
  </tr>";
}

echo "</table>";

