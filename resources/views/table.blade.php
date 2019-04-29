<div class="editor-js-block editor-js-table">
    <table class="tc-table tc-table__wrap">
        @foreach($content as $row)
            <tr>
                @foreach($row as $cell)
                    <td class="tc-table__cell"><div class="tc-table__area">{{ $cell }}</div></td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>