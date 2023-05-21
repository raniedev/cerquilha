<div>
    <button id="btn-emojis" class="btn-modal">🙂Emojis</button>
    <div id="modal-emojis" class="modal"> <!--style="display: none;"-->
        <table>
            <?php
            $emojis = array(
                array('🙂','😀','😂','🥰','😎','😲','😢','😭','🤐','🤫'),
                array('😴','🥳','😡','🤢','🤡','👍','👎','👉','👈','👌',),
                array('✋','👊','🙏','💪','✍️', '📢','🎵','🎁','🎉','💰'),
                array('📃','📆','📘','📚','🔍','🖊️','✏️','📐','📌','💻'),
                array('⏰','🎓','🧬', '💉', '💡', '☕','🍞','🥩','🍪','🍰'),
                array('🍦','🍬','🍫','🍎','🍌','🍉','🍓','🍇','🍊','🍒'),
                array('🌎','🌞','🌜','⭐','💧','🔥','⚡','🌳','🌺','🌹'),
                array('🐶','🐱','🐠','🐞','🦜','🐇','🦋','🦉','🐍','🕊️')
            );

            $loop = 0;
            for($loop; $loop < count($emojis); $loop++){
                ?><tr>
                    <?php
                    foreach ($emojis[$loop] as $emoji) {
                        echo '<td><button type="button" class="emoji">'.$emoji.'</button></td>';
                    }?>
                </tr>
            <?php }?>
        </table>
    </div>

    <button id="btn-simbolos" class="btn-modal">➗Símbolos</button>
    <div id="modal-simbolos" class="modal">
        <table>
            <?php
            $emojis = array(
                array('α','β','γ','Δ','δ','ε','ζ','η','Θ','θ'),
                array('ι','κ','Λ','λ','μ','ν','Ξ','ξ','Π','π'),
                array('ρ','Σ','σ','τ','υ','Φ','φ','χ','Ψ','ψ'),
                array('Ω','ω','∀','∈','∉','∋','∌','∑','√','∛'),
                array('∜','∞','∪','∩','∫','∬','∭','∮','∯','∰'),
                array('∱','∲','∳','∴','∵','∷','≅','≆','≇','≈'),
                array('÷','¼','½','¾','≤','≥','¬','←','→','↔'),
                array('⇐','⇒','⇔','≠','±','⊆','⊂','∅','∞','∇')
            );

            $loop = 0;
            for($loop; $loop < count($emojis); $loop++){
                ?><tr>
                    <?php
                    foreach ($emojis[$loop] as $emoji) {
                        echo '<td><button type="button" class="simbolos">'.$emoji.'</button></td>';
                    }?>
                </tr>
            <?php }?>
        </table>
    </div>
    <span id="contador"></span>
</div>