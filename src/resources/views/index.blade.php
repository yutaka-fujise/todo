    @extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    @if(session('message'))
<div class = "todo__alert--success">
    {{ session('message') }}
    <?php 
    // 値は、セッションに保存されているので、セッションから値を取り出す処理 ?>
</div>
    @endif
    <?php 
    // @ifディレクティブを使って、メッセージがある時のみ表示する(=メッセージがない時は表示しない)設定 ?>
    @if ($errors->any())
   <div class="todo__alert--danger">
     <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
    @endif
 <?php 
//  バリデーションに引っかかった際のエラーメッセージは、$errorsに格納されており、@foreachディレクティブを使用し、$errorとして展開 ?>
</div>

<div class="todo__content">
  <?php 
//   <form class="create-form"> ?>
<form class="create-form" action="/todos" method="post">
    @csrf
    <?php 
    // formタグの method属性と action属性を設定し、store アクションを呼び出すルーティングと紐付け。@csrfをつけ忘れると、419エラーが返ってきます。 419エラーが出たら、@csrfのつけ忘れ ?>
    <div class="create-form__item">
      <input class="create-form__item-input" type="text" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">作成</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
      </tr>
      @foreach ($todos as $todo)
      <?php 
    //   追加 ?>
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <?php 
        //   <form class="update-form"> ?>
            <form class="update-form" action="/todos/update" method="POST">
                @method('PATCH')
                @csrf
                <?php 
                // データの更新をする時は、PATCHメソッドを使用します。 しかし、HTMLのフォームには、直接指定することができません。HTMLのfromタグにはPOSTを指定し、@methodディレクティブでPATCHを指定します ?>
            <div class="update-form__item">
              <?php 
            //   <input class="update-form__item-input" type="text" name="content" value="test"> ?>
               <?php 
            //    <input class="update-form__item-input">{{ $todo['content'] }}</input> ?>
                <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                <?php 
                // Todoのidは、inputタグのhidden属性を指定して、コントローラに値を渡します。 ?>
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit" type="submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <?php 
        //   <form class="delete-form"> ?>
            <form class="delete-form" action="/todos/delete" method="POST">
             @method('DELETE')
             @csrf
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
      <?php 
    // //   <tr class="todo-table__row">
    //     <td class="todo-table__item">
    //       <form class="update-form">
    //         <div class="update-form__item">
    //           <input class="update-form__item-input" type="text" name="content" value="test2">
    //         </div>
    //         <div class="update-form__button">
    //           <button class="update-form__button-submit" type="submit">更新</button>
    //         </div>
    //       </form>
    //     </td>
    //     <td class="todo-table__item">
    //       <form class="delete-form">
    //         <div class="delete-form__button">
    //           <button class="delete-form__button-submit" type="submit">削除</button>
    //         </div>
    //       </form>
    //     </td>
    //   </tr> ?>
    </table>
  </div>
</div>
@endsection
