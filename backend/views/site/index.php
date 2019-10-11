<?php

/* @var $this yii\web\View */

use backend\models\Apple;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Test!</h1>

    </div>

    <div class="body-content">

        <div class="row">

            <table style="width: 100%; margin-bottom: 50px; font-size: 16px; text-align: center;">
                <tr>
                    <td>Color</td>
                    <td>Status</td>
                    <td>Percent left</td>
                    <td>Eat</td>
                    <td>Drop</td>
                </tr>
                <?php foreach ($apples as $apple) { ?>
                    <tr>
                        <td>
                            <div style="width:30px; height: 30px; border-radius:50%; background-color: <?php echo $apple['color'] ?>"></div>
                        </td>
                        <td>
                            <?php echo $apple['status'] ?>
                        </td>
                        <td>
                            <?php echo $apple['rest'] ?>%
                        </td>
                        <td>
                            <?php if ($apple['status'] === Apple::STATUS_ON_FLORE): ?>
                                <form method="POST" action="/eat">
                                    <input name="id" type="hidden" value="<?php echo $apple['id'] ?>">
                                    <input type="hidden" name="_csrf-backend"
                                           value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                    <input name="percent" type="number" required>
                                    <input type="submit" value="EAT">
                                </form>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($apple['status'] === Apple::STATUS_ON_TREE): ?>
                                <a href="/drop/<?php echo $apple['id'] ?>">
                                    <button>DROP</button>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>

                <?php } ?>
            </table>

            <a href="/generate">
                <button>
                    generate
                </button>
            </a>
        </div>

    </div>
</div>
