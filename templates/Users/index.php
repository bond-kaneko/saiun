<div class="users index content">
    <h3>マイページ</h3>
    <div class="table-responsive">
        <table>
            <tr>
                <th>ユーザー名</th>
                <td><?= h($user->name); ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= h($user->email); ?></td>
            </tr>
        </table>
    </div>
</div>
